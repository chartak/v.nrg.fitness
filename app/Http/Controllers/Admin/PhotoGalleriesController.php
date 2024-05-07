<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPhotoGalleryRequest;
use App\Http\Requests\StorePhotoGalleryRequest;
use App\Http\Requests\UpdatePhotoGalleryRequest;
use App\PhotoGallery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PhotoGalleriesController extends Controller
{
    use MediaUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = PhotoGallery::with(['branch'])->select(sprintf('%s.*', (new PhotoGallery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'photo_gallery_show';
                $editGate      = 'photo_gallery_edit';
                $deleteGate    = 'photo_gallery_delete';
                $crudRoutePart = 'photo-galleries';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });
//            $table->editColumn('orderby', function ($row) {
//                return $row->orderby ? $row->orderby : "";
//            });
            $table->editColumn('photo', function ($row) {
                if (!$row->photo) {
                    return '';
                }

                $links = [];

                foreach ($row->photo as $media) {
                    $links[] = '<a href="' . asset($media->getUrl()) . '" target="_blank"><img src="' . asset($media->getUrl()) . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->addColumn('branch_branch_name', function ($row) {
                return $row->branch ? $row->branch->branch_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'photo', 'branch']);

            return $table->make(true);
        }

        return view('admin.photoGalleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('photo_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.photoGalleries.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhotoGalleryRequest $request)
    {
        $photoGallery = PhotoGallery::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $photoGallery->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photo');
        }

        return redirect()->route('admin.photo-galleries.index');
    }

    public function edit(PhotoGallery $photoGallery)
    {
        abort_if(Gate::denies('photo_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $photoGallery->load('branch');

        return view('admin.photoGalleries.edit', compact('branches', 'photoGallery'));
    }

    public function update(UpdatePhotoGalleryRequest $request, PhotoGallery $photoGallery)
    {
        $photoGallery->update($request->all());

        if (count($photoGallery->photo) > 0) {
            foreach ($photoGallery->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }

        $media = $photoGallery->photo->pluck('file_name')->toArray();

        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $photoGallery->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.photo-galleries.index');
    }

    public function show(PhotoGallery $photoGallery)
    {
        abort_if(Gate::denies('photo_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photoGallery->load('branch');

        return view('admin.photoGalleries.show', compact('photoGallery'));
    }

    public function destroy(PhotoGallery $photoGallery)
    {
        abort_if(Gate::denies('photo_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photoGallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhotoGalleryRequest $request)
    {
        PhotoGallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

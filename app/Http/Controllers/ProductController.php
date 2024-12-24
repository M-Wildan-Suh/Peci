<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with('productgallery')->get();
        
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $newdata = new Product;

        $newdata->name = $request->name;
        $newdata->price = $request->price;
        $newdata->description = $request->description;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = time();
            $imagePath = public_path('storage/images/product/');
        
            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);
        
            $newdata->image = $imageName . '.webp';
        }

        $newdata->save();

        if ($request->has('image_gallery') && !empty($request->image_gallery)) {
            foreach ($request->image_gallery as $image) {
                $newimage = new ProductGallery;
                $newimage->product_id = $newdata->id;
        
                // Pastikan image adalah instance dari UploadedFile
                if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
                    // Ambil nama file tanpa ekstensi
                    $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    
                    // Tambahkan tanggal saat ini
                    $currentDate = now()->format('YmdHis');
                    
                    // Gabungkan nama file dan tanggal input
                    $imageName = $originalName . '_' . $currentDate;
        
                    $imagePath = public_path('storage/images/product/gallery/');
        
                    $manager = new ImageManager(new Driver());
                    $imageOptimized = $manager->read($image->getPathname());
                    $imageFullPath = $imagePath . $imageName . '.webp';
                    $imageOptimized->save($imageFullPath);
        
                    // Simpan nama file dengan ekstensi .webp
                    $newimage->image = $imageName . '.webp';
                    $newimage->image_alt = $imageName;
                }
        
                $newimage->save();
            }
        }  

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            if ($product->image) {
                $path = public_path('storage/images/product/' . $product->image);

                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/product/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $product->image = $imageName . '.webp';
        }

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the main product image if it exists
        $path = public_path('storage/images/product/' . $product->image);
        if (file_exists($path)) {
            unlink($path);
        }

        // Fetch associated product gallery images
        $productGalleries = ProductGallery::where('product_id', $product->id)->get();

        // Loop through each gallery image and delete it
        foreach ($productGalleries as $gallery) {
            $galleryPath = public_path('storage/images/product/gallery/' . $gallery->image); // Adjust the path as needed
            if (file_exists($galleryPath)) {
                unlink($galleryPath);
            }
            // Delete the gallery record from the database
            $gallery->delete();
        }

        // Finally, delete the product
        $product->delete();

        return redirect()->back()->with('success', 'product and its gallery images deleted successfully.');
    }
}

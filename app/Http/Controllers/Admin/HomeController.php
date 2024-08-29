<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\JobCategory;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  use FileUploadTrait;

  public function heroIndex()
  {
    $hero = HeroSection::first();
    return view('admin.home-manage.hero-section.index', compact('hero'));
  }

  public function heroUpdate(Request $request)
  {
    $request->validate([
      'image' => ['nullable', 'image', 'max:10000'],
      'title' => 'required',
      'subtitle' => 'required',
      'button_name' => 'required',
      'button_link' => 'required',
    ]);

    $hero = HeroSection::first();

    if (!$hero) {
      $imagePath = $this->uploadFile($request, 'image', 'uploads/hero-sections');
    } else {
      if ($request->hasFile('image')) {
        $imagePath = $this->uploadFile($request, 'image', 'uploads/hero-sections', $hero->image);
      } else {
        $imagePath = $hero->image;
      }
    }

    HeroSection::updateOrCreate(
      ['id' => 2],
      [
        'image' => $imagePath,
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'button_name' => $request->button_name,
        'button_link' => $request->button_link
      ]
    );

    flash()->addSuccess('Cập nhật phần mở đầu thành công!', "Thành công");

    return redirect()->back();
  }

  public function featuredCategories()
  {
    $jobCategories = JobCategory::orderBy("id", "desc")->get();

    return view('admin.home-manage.featured-category.index', compact('jobCategories'));
  }

  public function featuredCategoriesChangeStatus(Request $request)
  {
    $category = JobCategory::findOrFail($request->id);
    $category->is_featured = $request->status == "true" ? 1 : 0;
    $category->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }

  public function featuredCategoriesChangeStatusJobFeatured(Request $request)
  {
    $categoryCount = JobCategory::where('is_job_featured', 1)->count();

    if ($categoryCount == 10 && $request->status == "true") {
      return response([
        "success" => false,
        "message" => "Chỉ hiển thị tối đa 10 danh mục ở mục Tin tuyển dụng nổi bật!",
      ]);
    }

    $category = JobCategory::findOrFail($request->id);
    $category->is_job_featured = $request->status == "true" ? 1 : 0;
    $category->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

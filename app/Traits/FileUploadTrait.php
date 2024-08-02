<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadTrait
{
  public function uploadFile(Request $request, $inputName, $path = "uploads", $oldPath = null)
  {
    if ($request->hasFile($inputName)) {

      if ($oldPath) {
        $this->deleteFile($oldPath);
      }

      $image = $request->file($inputName);
      $ext = $image->getClientOriginalExtension();
      $imageName = "image_" . uniqid() . "." . $ext;
      $image->move(public_path($path), $imageName);

      return $path . "/" . $imageName;
    }

    return "";
  }

  public function deleteFile($path)
  {
    if (file_exists(public_path($path))) {
      unlink(public_path($path));
    }
  }
}

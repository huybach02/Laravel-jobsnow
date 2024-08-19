<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $jobCategories = [
      "Kế toán - Kiểm toán",
      "Nhân sự",
      "Hành chính - Văn phòng",
      "Bán hàng",
      "Chăm sóc khách hàng",
      "Marketing - PR",
      "Kinh doanh",
      "IT - Phần mềm",
      "IT - Phần cứng / Mạng",
      "Thiết kế đồ họa",
      "Xây dựng",
      "Kiến trúc - Thiết kế nội thất",
      "Sản xuất - Vận hành sản xuất",
      "Cơ khí - Chế tạo",
      "Điện - Điện tử",
      "Vận tải - Lái xe",
      "Kho vận - Vật tư",
      "Môi trường",
      "Dịch vụ",
      "Giáo dục - Đào tạo",
      "Y tế - Dược",
      "Ngân hàng",
      "Bảo hiểm",
      "Pháp lý",
      "Xuất nhập khẩu",
      "Biên - Phiên dịch",
      "Quản lý điều hành",
      "Thực phẩm - Đồ uống",
      "Du lịch",
      "Khách sạn - Nhà hàng",
      "Bất động sản",
      "Truyền hình / Báo chí / Biên tập",
      "Nông nghiệp - Lâm nghiệp",
      "Thể dục / Thể thao",
      "Nghệ thuật / Điện ảnh",
      "Thủ công mỹ nghệ",
      "Tài chính - Đầu tư",
      "Chứng khoán",
      "Hàng hải",
      "Hàng không",
      "Viễn thông",
      "Công nghệ Ô tô - Xe máy",
      "Hoá học - Sinh học",
      "Dầu khí",
      "Thời trang",
      "May mặc - Da giày",
      "In ấn - Xuất bản",
      "Tư vấn",
      "Kiểm định - Đảm bảo chất lượng",
      "Khác"
    ];

    foreach ($jobCategories as $category) {
      $jobCategory = new JobCategory();
      $jobCategory->name = $category;
      $jobCategory->slug = Str::slug($category);
      $jobCategory->status = 1;
      $jobCategory->save();
    }
  }
}

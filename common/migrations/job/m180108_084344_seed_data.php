<?php

use common\migrations\BaseMigration;
use yii\helpers\Inflector;
use common\dictionaries\AdsType;

class m180108_084344_seed_data extends BaseMigration
{
    public function up()
    {
        $dataCompanySize = [
            '1 - 9',
            '10 - 99',
            '100 - 499',
            '500 - 999',
            '1000 - 4999',
            '>5000',
        ];

        foreach ($dataCompanySize as $key => $item) {
            $this->insert('job_company_size', [
                'title'       => $item,
                'status'      => 1,
                'type'        => 1,
                'sort_number' => $key,
            ]);
        }

        $dataCompany = [
            //['Company Title','Short Title','Logo Img'],
            ['TẬP ĐOÀN VINGROUP – CÔNG TY CP', 'VINGROUP', 'Vingroup.jpg'],
            ['CÔNG TY CP TẬP ĐOÀN ĐẦU TƯ ĐỊA ỐC NOVA', 'NOVALAND', 'NovaLand.jpg'],
            ['CÔNG TY CP ĐỊA ỐC SÀI GÒN THƯƠNG TÍN', 'SAI GON THUONG TIN', 'Sacomreal.jpg'],
            ['CÔNG TY CP TẬP ĐOÀN C.E.O', 'C.E.O', 'CEOGroup.jpg'],
            ['CÔNG TY TNHH HÒA BÌNH', 'HOA BINH', 'HoaBinhGroup.jpg'],
            ['CÔNG TY CP HIM LAM', 'HIM LAM', 'HimLam.jpg'],
            ['CÔNG TY CP TẬP ĐOÀN MẶT TRỜI', 'SUN GROUP', 'SunGroup.jpg'],
            ['CÔNG TY CP DỊCH VỤ VÀ XÂY DỰNG ĐỊA ỐC ĐẤT XANH', 'DAT XANH', 'DatXanhGroup.jpg'],
            ['CÔNG TY CP ĐỊA ỐC PHÚ LONG', 'PHU LONG', 'PhuLong.jpg'],
            ['CÔNG TY CP TẬP ĐOÀN HÀ ĐÔ', 'HA DO GROUP', 'HaDoGroup.jpg'],
            ['CÔNG TY CP DỊCH VỤ VÀ ĐỊA ỐC ĐẤT XANH MIỀN BẮC', 'DAT XANH MIEN BAC', 'DatXanhMienBac.jpg'],
            ['CÔNG TY CP BẤT ĐỘNG SẢN THẾ KỶ', 'CENGROUP', 'CenGroup.jpg'],
            ['CÔNG TY TNHH SAVILLS VIỆT NAM (CHESTERTON PETTY VIET NAM)', 'SAVILL VIETNAM', 'Savills.jpg'],
            ['CÔNG TY CP DỊCH VỤ THƯƠNG MẠI XÂY DỰNG ĐỊA ỐC KIM OANH', 'KIM OANH SERVICE', 'KimOanh.jpg'],
            ['CÔNG TY CP BẤT ĐỘNG SẢN KHẢI HOÀN LAND', 'KHAI HOAN LAND', 'KhaiHoanLand.jpg'],
        ];

        $baseUrl = Yii::$app->fileStorage->baseUrl;
        foreach ($dataCompany as $key => $item) {
            $this->insert('job_company', [
                'slug'               => Inflector::slug($item[0]),
                'title'              => $item[0],
                'title_short'        => $item[1],
                'body'               => $item[0],
                'view'               => 'view',
                'thumbnail_base_url' => $baseUrl,
                'thumbnail_path'     => 'company/property/' . $item[2],

                'type'       => AdsType::PROPERTY,
                'status'     => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }

        $dataJobMainCategory = [
            ['XÂY DỰNG',
                ['Xây dựng',
                    'Kiến trúc/Thiết kế nội thất',
                    'Bất động sản']
            ],
            ['KỸ THUẬT', ['Điện/Điện tử',
                'Cơ khí',
                'Hóa học/Hóa sinh',
                'Môi trường/Xử lý chất thải',
                'Điện lạnh/Nhiệt lạnh']
            ],
            ['TRUYỀN THÔNG', ['Viễn Thông',
                'Truyền hình/Truyền thông/Báo chí',
                'Mỹ Thuật/Nghệ Thuật/Thiết Kế',
                'Quảng cáo/Khuyến mãi/Đối ngoại',
                'Internet/Online Media',
                'In ấn/ Xuất bản']],
            ['SẢN XUẤT', ['Dầu khí',
                'Dệt may/Da giày',
                'Dược Phẩm/Công nghệ sinh học',
                'Tự động hóa/Ô tô',
                'Nông nghiệp/Lâm nghiệp',
                'Sản phẩm công nghiệp',
                'Công nghệ cao',
                'Địa chất/Khoáng sản']],
            ['DỊCH VỤ TÀI CHÍNH', ['Ngân hàng',
                'Kiểm toán',
                'Tài chính/Đầu tư',
                'Chứng khoán',
                'Bảo hiểm']],
            ['HÀNG TIÊU DÙNG & BÁN LẺ', ['Hàng tiêu dùng',
                'Hàng gia dụng',
                'Bán lẻ/Bán sỉ',
                'Thực phẩm & Đồ uống',
                'Thời trang',
                'Hàng cao cấp']],
            ['Y TẾ', ['Y tế/Chăm sóc sức khỏe',
                'Bác sĩ',
                'Y sĩ/Hộ lý',
                'Dược sĩ',
                'Trình dược viên']],
            ['DỊCH VỤ', ['Phi chính phủ/Phi lợi nhuận',
                'Giáo dục/Đào tạo',
                'Y tế/Chăm sóc sức khỏe',
                'Tư vấn']],
            ['KHÁCH SẠN & DU LỊCH', ['Hàng không/Du lịch',
                'Nhà hàng/Khách sạn']],
            ['VẬN TẢI', ['Vận chuyển/Giao nhận',
                'Kho vận',
                'Hàng hải']],
            ['GIAO DỊCH KHÁCH HÀNG', ['Marketing',
                'Bán hàng',
                'Dịch vụ khách hàng',
                'Bán hàng kỹ thuật']],
            ['BỘ PHẬN HỖ TRỢ', ['Hành chánh/Thư ký',
                'Kế toán',
                'Nhân sự',
                'Biên phiên dịch',
                'Pháp lý']],
            ['KỸ THUẬT - CÔNG NGHỆ', ['IT-Phần cứng/Mạng',
                'IT - Phần mềm',]],
            ['HỖ TRỢ SẢN XUẤT', ['Xuất nhập khẩu',
                'QA/QC',
                'Sản Xuất',
                'Thu Mua/Vật Tư/Cung Vận',
                'An toàn lao động',
                'Bảo trì/Sửa chữa',
                'Hoạch định/Dự án']],
        ];

        $dataJobCategory = [
            'Kế toán',
            'Kinh doanh',
            'IT - Phần mềm',
            'IT - Phần cứng',
            'Ngân hàng',
            'Nhân viên kinh doanh',
            'Kế toán-Kiểm toán',
            'Hành chính-Văn phòng',
            'Marketing-PR',
            'Bán hàng',
            'Xây dựng',
            'Tư vấn',
            'IT phần mềm',
            'Cơ khí-Chế tạo',
            'Điện-Điện tử-Điện lạnh',
            'Kỹ thuật',
            'Kiến trúc-TK nội thất',
            'Nhân sự',
            'Giáo dục-Đào tạo',
            'Y tế-Dược',
            'Quản trị kinh doanh',
            'Biên-Phiên dịch',
            'KD bất động sản',
            'Thiết kế-Mỹ thuật',
            'Ngoại thương-Xuất nhập khẩu',
            'Dệt may - Da giày',
            'Dịch vụ',
            'Khách sạn-Nhà hàng',
            'Thư ký-Trợ lý',
            'Kho vận-Vật tư',
            'IT phần cứng/mạng',
            'Thiết kế đồ hoạ web',
            'Điện tử viễn thông',
            'Ngân hàng',
            'Tiếp thị-Quảng cáo',
            'Kỹ thuật ứng dụng',
            'Du lịch',
            'Thương mại điện tử',
            'Vận tải',
            'Ngành nghề khác',
            'Hoá học-Sinh học',
            'Thời trang',
            'Ô tô - Xe máy',
            'Pháp lý - Luật',
            'Báo chí - Truyền hình',
            'Bảo hiểm',
            'Công nghiệp',
            'Thực phẩm - Đồ uống',
            'In ấn - Xuất bản',
            'Spa - Mỹ phẩm - Trang sức',
            'Tài chính - Đầu tư',
            'Nông - Lâm - Ngư nghiệp',
            'Quan hệ đối ngoại',
            'Tổ chức sự kiện - Quà tặng',
            'Bưu chính',
            'Dầu khí - Hóa chất',
            'Hoạch định - Dự án',
            'Công nghệ cao',
            'An ninh - Bảo vệ',
            'Nghệ thuật - Điện ảnh',
            'Hàng gia dụng',
            'Chứng khoán - Vàng',
            'Hàng không',
            'Game',
        ];


        $inc = 1;
        foreach ($dataJobMainCategory as $key => $item) {
            $this->insert('job_category', [
                'id'                 => $inc,
                'slug'               => Inflector::slug($item[0]),
                'title'              => $item[0],
                'body'               => $item[0],
                'thumbnail_base_url' => '',
                'thumbnail_path'     => '',
                'status'             => 1,
                'created_at'         => time(),
                'updated_at'         => time(),
            ]);
            $subCat = $item[1];
            $incSub = 1;
            foreach ($subCat as $keySubCat => $itemSubCat) {
                $this->insert('job_category', [
                    'parent_id'          => $inc,
                    'slug'               => Inflector::slug($itemSubCat),
                    'title'              => $itemSubCat,
                    'body'               => $itemSubCat,
                    'thumbnail_base_url' => '',
                    'thumbnail_path'     => '',
                    'status'             => 1,
                    'created_at'         => time(),
                    'updated_at'         => time(),
                ]);
                $incSub++;
            }

            $inc = $inc + $incSub + 1;
        }

    }

    public function down()
    {
        echo "m180108_084344_seed_data cannot be reverted.\n";
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

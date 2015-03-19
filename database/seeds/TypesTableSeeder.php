<?php
use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder{
    
    public function run(){
        DB::table('types')->delete();
        
        //创建初始类型数据   主键是：type_id
        Type::create(['type_name' => 'EC-OS']);
        Type::create(['type_name' => '安装与部署']);
        Type::create(['type_name' => 'ECStore相关']);
        Type::create(['type_name' => 'ERP相关']);
        Type::create(['type_name' => 'CRM相关']);
        Type::create(['type_name' => '系统联通/矩阵']);
        Type::create(['type_name' => '其他']);
        
       
    }
}

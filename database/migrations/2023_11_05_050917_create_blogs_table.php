<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->comment('รหัสประเภท Blog')->index();
            $table->string('title')->comment('หัวข้อ Blog');
            $table->string('title_sub')->comment('หัวข้อย่อย Blog');
            $table->text('description')->nullable()->comment('รายละเอียด Blog');
            $table->string('images')->nullable()->comment('ชื่อรูปหลัก Blog');
            $table->string('file_pdf_name')->nullable()->comment('ชื่อไฟล์ PDF');
            $table->string('link_youtube')->nullable()->comment('ลิงค์ Youtube');

            $table->longText('summarynote')->nullable()->comment('เก็บข้อมูลใน Summary Note');

            $table->string('meta_title')->nullable()->comment('Meta Title');
            $table->string('meta_description')->nullable()->comment('Meta Description');
            $table->string('meta_keywords')->nullable()->comment('Meta Keywords');  

            $table->integer('count_view')->comment('จำนวนผู้เข้าชม');   
            $table->boolean('status')->comment('สถานะการแสดงผล');
            $table->integer('user_id')->comment('รหัสผู้สร้าง blog');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};

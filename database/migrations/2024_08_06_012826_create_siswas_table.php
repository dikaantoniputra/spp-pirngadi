<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->default('988-13366-Yayasan Badan Pendidikan Dan Pengajaran Kristen Pirngadi (YBPPKP)');
            $table->string('va_number')->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('billing_id')->nullable();
            $table->string('spp_tiap_bulan')->nullable();
            $table->string('billing_amount')->nullable();
            $table->date('va_creation_date')->nullable();
            $table->date('va_expiry_date')->nullable();
            $table->string('description')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('kelas')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('siswas');
    }
}

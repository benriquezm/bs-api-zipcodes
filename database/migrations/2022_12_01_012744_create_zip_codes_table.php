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
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('d_codigo')->length(5)->nullable()->default(99999);
            $table->string('d_asenta')->length(70)->nullable()->default('no settlement');
            $table->string('d_tipo_asenta')->length(30)->nullable()->default('no type settlement');
            $table->string('d_mnpio')->length(60)->nullable()->default('no municipality');
            $table->string('d_estado')->length(40)->nullable()->default('no state');
            $table->string('d_ciudad')->length(60)->nullable()->default('no city');
            $table->integer('d_cp')->length(5)->nullable()->default(99999);
            $table->smallInteger('c_estado')->length(3)->nullable()->default(99);
            $table->integer('c_oficina')->length(5)->nullable()->default(99999);
            $table->smallInteger('c_cp')->length(1)->nullable()->default(0);
            $table->smallInteger('c_tipo_asenta')->length(3)->nullable()->default(99);
            $table->smallInteger('c_mnpio')->length(4)->nullable()->default(999);
            $table->integer('id_asenta_cpcons')->length(5)->nullable()->default(9999);
            $table->string('d_zona')->length(15)->nullable()->default('no zone');
            $table->smallInteger('c_cve_ciudad')->length(3)->nullable()->default(99);
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
        Schema::dropIfExists('zip_codes');
    }
};

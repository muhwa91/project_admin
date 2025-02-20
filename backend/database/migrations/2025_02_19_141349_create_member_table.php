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
        Schema::create('member', function (Blueprint $table) {
            $table->comment = 'member 테이블';
            $table->bigIncrements('mb_id')->comment('PK');
            $table->integer('mb_right')->default(1)->comment('1:일반유저, 9:관리자');
            $table->integer('mb_status')->default(1)->comment('1:승인대기, 2:승인, 3:보류, 4:미승인, 5:탈퇴');
            $table->string('mb_login_id', 50)->default('')->comment('로그인 ID');
            $table->string('mb_pwd', 255)->default('')->comment('비밀번호');
            $table->string('mb_name', 50)->default('')->comment('이름');
            $table->string('mb_phone', 13)->default('')->comment('휴대폰번호');
            $table->string('mb_email', 255)->default('')->comment('이메일');
            $table->datetime('mb_pwd_chg_datetime')->nullable()->comment('비밀번호 변경 일자');
            $table->integer('w_mb_id')->default(0)->comment('등록자 ID');
            $table->datetime('w_datetime')->nullable()->comment('등록일자');
            $table->integer('u_mb_id')->default(0)->comment('수정자 ID');
            $table->datetime('u_datetime')->nullable()->comment('수정일자');
            $table->integer('d_mb_id')->default(0)->comment('삭제자 ID');
            $table->datetime('d_datetime')->nullable()->comment('삭제일자');
            $table->text('login_token')->nullable()->comment('토큰');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
};

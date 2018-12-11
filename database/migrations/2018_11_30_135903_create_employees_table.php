<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->tinyInteger('employee_type')->comment('0内部员工 1外部员工');
            $table->string('check_no')->comment('考勤编号');
            $table->string('employee_name', 10)->comment('员工姓名');
            $table->tinyInteger('sex')->comment('员工性别');
            $table->integer('dept_id')->comment('部门');
            $table->integer('position_id')->comment('职位');
            $table->integer('rank_id')->comment('职级');
            $table->string('company_qq', 20)->comment('企业qq');
            $table->string('email', 40)->comment('邮箱');
            $table->string('personal_email', 40)->comment('个人邮箱');
            $table->string('phone', 50)->comment('手机号');
            $table->string('wechat', 50)->comment('微信号');
            $table->tinyInteger('is_responsible')->comment('是否是负责人 0:否,1:是');
            $table->integer('group_id')->comment('员工组别');
            $table->string('org_path', 255)->comment('在组织架构的路径');
            $table->string('work_address', 100)->comment('工作地址');
            $table->date('entry_date')->comment('入职日期');
            $table->string('probation')->comment('试用期');
            $table->date('formal_date')->comment('转正日期');
            $table->tinyInteger('is_leave')->comment('是否离职');
            $table->date('demission_date')->comment('离职日期');
            $table->string('emergency_contact_person', 50)->comment('紧急联络人');
            $table->string('emergency_contact_tel', 50)->comment('紧急联络人电话');
            $table->string('id_card_no', 50)->comment('身份证号');
            $table->date('id_card_expire_time')->comment('身份证到期时间');
            $table->date('birth_date')->comment('出生日期');
            $table->date('birthday_date')->comment('生日日期');
            $table->tinyInteger('birthday_type')->comment('生日类型 1阳历 2农历');
            $table->string('varchar', 50)->comment('民族');
            $table->string('marry_status', 50)->comment('婚姻状况');
            $table->string('register_address', 128)->comment('户籍地址');
            $table->string('register_type', 50)->comment('户口类型');
            $table->string('zip_code', 50)->comment('邮编');
            $table->string('highest_education', 50)->comment('最高学历');
            $table->string('graduate_school', 50)->comment('毕业学校');
            $table->string('profession_major', 50)->comment('专业');
            $table->date('graduation_date')->comment('毕业时间');
            $table->string('profession_rank', 50)->comment('职称');
            $table->string('certificate_no', 50)->comment('证书编号');
            $table->string('bank_name', 50)->comment('工商银行开户行');
            $table->string('card_no', 50)->comment('工行卡号');
            $table->string('cmb_bank_name')->comment('招商银行开户行');
            $table->string('cmb_card_no', 50)->comment('招商银行卡号');
            $table->string('spdb_bank_name', 50)->comment('浦发银行开户行');
            $table->string('spdb_card_no', 50)->comment('浦发银行卡号');
            $table->string('abc_bank_name', 50)->comment('农行开户行');
            $table->string('abc_card_no', 50)->comment('农行卡号');
            $table->date('contract_sign_date')->comment('合同签署日期');
            $table->string('contract_end_date', 50)->comment('合同到期日期');
            $table->tinyInteger('contract_num')->comment('现在执行第几个合同');
            $table->date('insurance_date')->comment('保险日期');
            $table->string('medicare_passbook', 50)->comment('医保存折');
            $table->string('medicare_card', 50)->comment('医保卡');
            $table->string('remark', 1024)->comment('备注');
            $table->tinyInteger('is_bj_housing')->comment('是否在北京有住房0=未填写1=有2=无');
            $table->tinyInteger('is_use_fund')->comment('是否使用公积金0=未填写1=是2=否');
            $table->tinyInteger('work_unit')->comment('工作单位:1，北京。2，天津');
            $table->string('receiver', 50)->comment('约面人');
            $table->string('referrer', 50)->comment('推荐人');
            $table->tinyInteger('application_channel')->comment('招聘渠道 1 校招 2社招');
            $table->tinyInteger('is_unify')->comment('是否是统招 1 是 2 否');
            $table->string('pays_city', 50)->comment('申请五险一金缴纳城市');
            $table->tinyInteger('social_security')->comment('是否在申请地交过社保 1 是 2 否');

            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}

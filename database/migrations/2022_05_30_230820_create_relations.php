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
        //groups
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('groups_id')->nullable()->after('PESEL');
            $table->foreign('groups_id')->references('id')->on('groups');
        });
        Schema::table('subject_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('groups_id')->nullable()->after('id');
            $table->foreign('groups_id')->references('id')->on('groups');
        });

        //subjects
        Schema::table('student_marks', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable()->after('marks');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable()->after('id');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
        Schema::table('subject_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable()->after('id');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

        //students
        Schema::table('student_marks', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('marks');
            $table->foreign('student_id')->references('id')->on('students');
        });

        //teachers
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable()->after('id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //groups
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_groups_id_foreign');
            $table->dropColumn('groups_id');
        });
        Schema::table('subject_classes', function (Blueprint $table) {
            $table->dropForeign('subject_classes_groups_id_foreign');
            $table->dropColumn('groups_id');
        });

        //subject
        Schema::table('student_marks', function (Blueprint $table) {
            $table->dropForeign('student_marks_subject_id_foreign');
            $table->dropColumn('subject_id');
        });
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('teacher_subjects_subject_id_foreign');
            $table->dropColumn('subject_id');
        });
        Schema::table('subject_classes', function (Blueprint $table) {
            $table->dropForeign('subject_classes_subject_id_foreign');
            $table->dropColumn('subject_id');
        });

        //students
        Schema::table('student_marks', function (Blueprint $table) {
            $table->dropForeign('student_marks_student_id_foreign');
            $table->dropColumn('student_id');
        });

        //teachers
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('teacher_subjects_teacher_id_foreign');
            $table->dropColumn('teacher_id');
        });
    }
};

<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = 'admin';
    const STUDENT = 'student';
    const TEACHER = 'teacher';

    const  TYPES = [
        self::ADMIN,
        self::STUDENT,
        self::TEACHER
    ];
}

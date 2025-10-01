<?php
namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'course_id', 'created_at'];

    public function getEnrolledCourses($studentId)
{
    return $this->db->table($this->table)
        ->select('courses.id as course_id, courses.course_name, courses.description')
        ->join('courses', 'courses.id = enrollments.course_id')
        ->where('enrollments.student_id', $studentId)
        ->get()
        ->getResultArray();
}

}

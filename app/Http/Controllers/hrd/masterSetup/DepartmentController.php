<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\DepartmentRequest;
use App\Models\hrd\Department;

class DepartmentController extends Controller
{
   public function index() {
        $departments = Department::query()->latest()->get();
        return view('hrd.masterSetup.department.index', ['departments' => $departments]);
   }

   public function create() {
        return view('hrd.masterSetup.department.form', 
        [
            'department' => new Department(),
            'page_meta' => [
               'title' => 'Tambah Data Departemen',
               'method' => 'post',
               'url' => route('department.store'),
               'submit_text' => 'Submit'
            ]
        ],
      );
   }

   public function store(DepartmentRequest $request) {
     Department::create($request->validated());
     return to_route('department.index');
   }

   public function edit(Department $department) {;
     return view('hrd.masterSetup.department.form', 
      [
         'department' => $department,
         'page_meta' => [
            'title'=> 'Update Data Departemen ' . '(' . $department->nama_department . ')',
            'method' => 'put',
            'url' => route('department.update', $department),
            'submit_text' => 'Update'
         ]
      ]);
   }

   function update(DepartmentRequest $request, Department $department) {
      $department->update($request->validated());
      return to_route('department.index');
   }

   public function destroy(Department $department) {
      $department->delete();
      return to_route('department.index');
   }
}

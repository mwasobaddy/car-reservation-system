<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Directorate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        // Sample departments data
        $departments = [
            //Directorate: Audit Services
            'No Department' => 'Audit Services',
            //Directorate: Corporate Services
            'Finanace & Accounts' => 'Corporate Services',
            'HRM' => 'Corporate Services',
            'Admin' => 'Corporate Services',
            'ICT' => 'Corporate Services',
            //Directorate: Corporation Secretary & Legal Services
            'Has No Directorate' => 'Corporation Secretary & Legal Services',
            //Directorate: Development
            'AFDB Development Projects' => 'Development',
            'Asia Development Projects' => 'Development',
            'Construction & In-house Supervision' => 'Development',
            'Europe Development Projects' => 'Development',
            'Project Reporting' => 'Development',
            'Structures Constructions' => 'Development',
            'World Bank Development Projects' => 'Development',
            //Directorate: Highway, Design & Safety (HDS)
            'Environment & Social Safeguards' => 'Highway, Design & Safety (HDS)',
            'Highway Design & Engineer Training' => 'Highway, Design & Safety (HDS)',
            'Highway Safety' => 'Highway, Design & Safety (HDS)',
            'Structure Design' => 'Highway, Design & Safety (HDS)',
            'Survey' => 'Highway, Design & Safety (HDS)',
            //Directorate: Maintenance
            'Axial Load Control' => 'Maintenance',
            'Bridge Maintenance' => 'Maintenance',
            'Corridor Maintenance' => 'Maintenance',
            'Regional Offices' => 'Maintenance',
            'Road Reserve Control Section' => 'Maintenance',
            //Directorate: No Directorate
            'Supply Chain Management' => 'No Directorate',
            //Directorate: Planning, Research & Complianace (PRC)
            'Corporate Communications' => 'Planning, Research & Complianace (PRC)',
            'ERM & BPR' => 'Planning, Research & Complianace (PRC)',
            'Planning & Road Management' => 'Planning, Research & Complianace (PRC)',
            'QA' => 'Planning, Research & Complianace (PRC)',
            'RI & KM' => 'Planning, Research & Complianace (PRC)',
            'Strategic, Budget & Economic Planning' => 'Planning, Research & Complianace (PRC)',
            //Directorate: Public Private Partnerships (PPP)
            'PPP Constructions' => 'Public Private Partnerships (PPP)',
            'PPP Operations & Maintenance' => 'Public Private Partnerships (PPP)',
            'PPP Preparatory' => 'Public Private Partnerships (PPP)',
        ];

        foreach ($departments as $departmentName => $directorateName) {
            $directorate = Directorate::firstWhere('name', $directorateName);
            
            if ($directorate) {
                Department::create([
                    'name' => $departmentName,
                    'directorate_id' => $directorate->id,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
            }
        }
    }
}
<?php

namespace App\Controller\Uploads;


use App\Entity\Userprofile;
use Symfony\Component\HttpFoundation\Request;

class UploadDriverLicenseBackController{

    public function __construct()
    {
        
    }

    public function __invoke(Request $request)
    {
        $userprofile = $request->attributes->get('data');
        if(!($userprofile instanceof Userprofile))
        {
            throw new \RuntimeException('Need Userprofile Instance');
        }
        $file = $request->files->get('file');
        // dd($file);
        $userprofile->setDriverlicensebackFile($file);
        $userprofile->setUpdatedat(new \DateTime());
      

        return $userprofile;
    }
}
<?php

namespace App\Controller;

use primus852\ShortResponse\ShortResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * @Route("/_ajax/_sendAppointment", name="ajaxSendAppointment")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function sendAppointment(Request $request)
    {

        /**
         * Gather vars
         */
        $dentist = $request->get('dentist');
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $date = $request->get('date');
        $time = $request->get('time');

        if($firstname === null || $firstname === ''){
            return ShortResponse::error('Bitte Vornamen ausfüllen');
        }

        if($lastname === null || $lastname === ''){
            return ShortResponse::error('Bitte Nachnamen ausfüllen');
        }

        if($date === null || $date === ''){
            return ShortResponse::error('Bitte Wunschdatum ausfüllen');
        }

        if($time === null || $time === ''){
            return ShortResponse::error('Bitte Wunschzeit ausfüllen');
        }

        if(($email === null || $email === '') && ($phone === null || $phone === '')){
            return ShortResponse::error('Bitte entweder E-Mail oder Telefon ausfüllen');
        }

        /**
         * @todo Send Mail
         */

        return ShortResponse::success('Anfrage gesendet');


    }
}

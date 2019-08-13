<?php

namespace App\Controller;

use primus852\ShortResponse\ShortResponse;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * @Route("/_ajax/_sendAppointment", name="ajaxSendAppointment")
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return JsonResponse
     */
    public function sendAppointment(Request $request, Swift_Mailer $mailer)
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
        $message = (new \Swift_Message('Neue Terminanfrage'))
            ->setFrom('kontakt@zahnarzt-kudamm-berlin.de')
            ->setTo('praxis@zahnarzt-kudamm-berlin.de')
            //->setTo('tw@mitscom.de')
            ->setBody(
                $this->renderView(
                    'default/email.html.twig',array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'app_date' => $date,
                        'app_time' => $time,
                        'email' => $email,
                        'phone' => $phone,
                        'dentist' => $dentist,
                    )
                ),
                'text/html'
            )
        ;

        $mailer->send($message);

        return ShortResponse::success('Anfrage gesendet');


    }
}

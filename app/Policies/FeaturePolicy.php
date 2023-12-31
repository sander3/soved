<?php

namespace App\Policies;

use Mazedlx\FeaturePolicy\Value;
use Mazedlx\FeaturePolicy\Directive;
use Mazedlx\FeaturePolicy\Policies\Policy;

class FeaturePolicy extends Policy
{
    public function configure()
    {
        $this
            ->addDirective(Directive::ACCELEROMETER, Value::NONE)
            ->addDirective(Directive::AMBIENT_LIGHT_SENSOR, Value::NONE)
            ->addDirective(Directive::AUTOPLAY, Value::NONE)
            ->addDirective(Directive::CAMERA, Value::NONE)
            ->addDirective(Directive::ENCRYPTED_MEDIA, Value::NONE)
            ->addDirective(Directive::FULLSCREEN, Value::NONE)
            ->addDirective(Directive::GEOLOCATION, Value::NONE)
            ->addDirective(Directive::GYROSCOPE, Value::NONE)
            ->addDirective(Directive::MAGNETOMETER, Value::NONE)
            ->addDirective(Directive::MICROPHONE, Value::NONE)
            ->addDirective(Directive::MIDI, Value::NONE)
            ->addDirective(Directive::PAYMENT, Value::NONE)
            ->addDirective(Directive::PICTURE_IN_PICTURE, Value::NONE)
            ->addDirective(Directive::SPEAKER, Value::NONE)
            ->addDirective(Directive::USB, Value::NONE)
            ->addDirective(Directive::VR, Value::NONE);
    }
}

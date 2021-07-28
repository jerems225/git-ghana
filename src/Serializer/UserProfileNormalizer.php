<?php

namespace App\Serializer;

use App\Entity\Userprofile;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Vich\UploaderBundle\Storage\StorageInterface;

class UserProfileNormalizer implements ContextAwareNormalizerInterface, NormalizerAwareInterface
{

    use NormalizerAwareTrait;

    private const ALREADY_CALLED = 'AppUserProfileNormalizerAlreadyCalled';

    public function __construct(private StorageInterface $storage)
    {
        
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return !isset($context[self::ALREADY_CALLED]) && $data instanceof Userprofile;
    }

    /**
     * @param Userprofile $object
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        $object->setPassportpicfileUrl($this->storage->resolveUri($object, 'passportpicfile'));
        $object->setDriverlicensefrontfileUrl($this->storage->resolveUri($object, 'driverlicensefrontfile'));
        $object->setDriverlicensebackfileUrl($this->storage->resolveUri($object, 'driverlicensebackfile'));
        $object->setIdentitycardfrontfileUrl($this->storage->resolveUri($object, 'identitycardfrontfile'));
        $object->setIdentitycardbackfileUrl($this->storage->resolveUri($object, 'identitycardbackfile'));
        $object->setFacefileUrl($this->storage->resolveUri($object, 'facefile'));
        $object->setPicturefileUrl($this->storage->resolveUri($object, 'picturefile'));
        
        $context[self::ALREADY_CALLED] = true;

        return $this->normalizer->normalize($object, $format, $context);
    }

}
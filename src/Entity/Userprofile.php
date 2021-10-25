<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\Uploads\UploadDriverLicenseBackController;
use App\Controller\Uploads\UploadDriverLicenseFrontController;
use App\Controller\Uploads\UploadFaceController;
use App\Controller\Uploads\UploadIdentityCardBackController;
use App\Controller\Uploads\UploadIdentityCardFrontController;
use App\Controller\Uploads\UploadPassPortController;
use App\Controller\Uploads\UploadProfileImageController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


// @ORM\Table(name="userprofile", indexes={@ORM\Index(name="baseCurrencyId", columns={"baseCurrencyId"}), @ORM\Index(name="countryId", columns={"countryId"}), @ORM\Index(name="timezoneId", columns={"timezoneId"}), @ORM\Index(name="userId", columns={"userId"}), @ORM\Index(name="verificationStatusId", columns={"verificationStatusId"})})

/**
 * Userprofile
 * 
 * @ORM\Entity(repositoryClass=UserprofileRepository::class)
 * @ORM\Table(name="userprofile")
 * @Vich\Uploadable()
 */
#[ApiResource(
    security: 'is_granted("ROLE_USER")',
    normalizationContext: ['groups'=>'read:collection'],
    denormalizationContext:['groups'=>['write:User','write:Userprofile','write:UserVerify']],
    collectionOperations:[
            'get'=>[
                'openapi_context' => [
                    'security' => [['bearerAuth' => []]],
                ]
              ],
            'post'=>[
                'openapi_context' => [
                    'security' => [['bearerAuth' => []]],
                ]
              ]
    ],
    itemOperations: [
        'put'=>[
            'openapi_context' => [
                'security' => [['bearerAuth' => []]],
            ]
          ],
        'delete'=>[
            'openapi_context' => [
                'security' => [['bearerAuth' => []]],
            ]
          ],
        'get' => [
            'normalization_context'=> ['groups'=> ['read:collection', 'read:item','read:UserVerify',
                                        'read:UserCountry','read:UserTimeZone','read:UserCurrency']],
            'openapi_context' => [
                'security' => [['bearerAuth' => []]],
            ]
        ],
        'passportpic'=>[
            'method' => 'POST',
            'path' => '/Userprofile/PassportUpload/{id}',
            'deserialize' => false,
            'controller' => UploadPassPortController::class,
            'openapi_context' => [
                'tags' => ['Upload User Files (KYC)'],
                'security' => [['bearerAuth' => []]],
                'requestBody' => [
                    'content' =>[
                        'multipart/form-data' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'file' => [
                                        'type' => 'string',
                                        'format' => 'binary'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],  
         ],
         'driverlicensefrontpic'=>[
             'method' => 'POST',
             'path' => '/Userprofile/DriverLicenseFrontUpload/{id}',
             'deserialize' => false,
             'controller' => UploadDriverLicenseFrontController::class,
             'openapi_context' => [
                 'tags' => ['Upload User Files (KYC)'],
                 'security' => [['bearerAuth' => []]],
                 'requestBody' => [
                     'content' =>[
                         'multipart/form-data' => [
                             'schema' => [
                                 'type' => 'object',
                                 'properties' => [
                                     'file' => [
                                         'type' => 'string',
                                         'format' => 'binary'
                                     ]
                                 ]
                             ]
                         ]
                     ]
                 ]
             ],  
          ],
          'driverlicensebackpic'=>[
              'method' => 'POST',
              'path' => '/Userprofile/DriverLicenseBackUpload/{id}',
              'deserialize' => false,
              'controller' => UploadDriverLicenseBackController::class,
              'openapi_context' => [
                  'tags' => ['Upload User Files (KYC)'],
                  'security' => [['bearerAuth' => []]],
                  'requestBody' => [
                      'content' =>[
                          'multipart/form-data' => [
                              'schema' => [
                                  'type' => 'object',
                                  'properties' => [
                                      'file' => [
                                          'type' => 'string',
                                          'format' => 'binary'
                                      ]
                                  ]
                              ]
                          ]
                      ]
                  ]
              ],  
           ],
           'identitycardfrontpic'=>[
               'method' => 'POST',
               'path' => '/Userprofile/IdentityCardFrontUpload/{id}',
               'deserialize' => false,
               'controller' => UploadIdentityCardFrontController::class,
               'openapi_context' => [
                   'tags' => ['Upload User Files (KYC)'],
                   'security' => [['bearerAuth' => []]],
                   'requestBody' => [
                       'content' =>[
                           'multipart/form-data' => [
                               'schema' => [
                                   'type' => 'object',
                                   'properties' => [
                                       'file' => [
                                           'type' => 'string',
                                           'format' => 'binary'
                                       ]
                                   ]
                               ]
                           ]
                       ]
                   ]
               ],  
            ],
            'identitycardbackpic'=>[
                'method' => 'POST',
                'path' => '/Userprofile/IdentityCardBackUpload/{id}',
                'deserialize' => false,
                'controller' => UploadIdentityCardBackController::class,
                'openapi_context' => [
                    'tags' => ['Upload User Files (KYC)'],
                    'security' => [['bearerAuth' => []]],
                    'requestBody' => [
                        'content' =>[
                            'multipart/form-data' => [
                                'schema' => [
                                    'type' => 'object',
                                    'properties' => [
                                        'file' => [
                                            'type' => 'string',
                                            'format' => 'binary'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],  
             ],
             'facepic'=>[
                 'method' => 'POST',
                 'path' => '/Userprofile/FaceUpload/{id}',
                 'deserialize' => false,
                 'controller' => UploadFaceController::class,
                 'openapi_context' => [
                     'tags' => ['Upload User Files (KYC)'],
                     'security' => [['bearerAuth' => []]],
                     'requestBody' => [
                         'content' =>[
                             'multipart/form-data' => [
                                 'schema' => [
                                     'type' => 'object',
                                     'properties' => [
                                         'file' => [
                                             'type' => 'string',
                                             'format' => 'binary'
                                         ]
                                     ]
                                 ]
                             ]
                         ]
                     ]

                 ],  
              ],
              'profilpic'=>[
                  'method' => 'POST',
                  'path' => '/Userprofile/ProfilImageUpload/{id}',
                  'deserialize' => false,
                  'controller' => UploadProfileImageController::class,
                  'openapi_context' => [
                      'tags' => ['Upload User Profil Image'],
                      'security' => [['bearerAuth' => []]],
                      'requestBody' => [
                          'content' =>[
                              'multipart/form-data' => [
                                  'schema' => [
                                      'type' => 'object',
                                      'properties' => [
                                          'file' => [
                                              'type' => 'string',
                                              'format' => 'binary'
                                          ]
                                      ]
                                  ]
                              ]
                          ]
                      ]
                  ],  
               ]


        ]
)]
class Userprofile
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstName", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastName", type="string", length=100, nullable=true)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $lastname;


//    #---------------------------------------------------- PassPort Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="passport_image", fileNameProperty="passportpic")
     */
    private $passportpicfile;


    /**
     * @var string|null
     *
     * @ORM\Column(name="passportPic", type="string", length=255, nullable=true)
     */
    
     //upload file

     #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $passportpic;

    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $passportpicfileUrl;


    //  #-------------------------------------------------- End --------------------------#

    // #---------------------------------------------------- driverlicensefrontpic Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="driverlicensefront_image", fileNameProperty="driverlicensefrontpic")
     */
    private $driverlicensefrontfile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="driverLicenseFrontPic", type="string", length=255, nullable=true)
     */

     //upload file
     
     #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $driverlicensefrontpic;

    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $driverlicensefrontfileUrl;

    // #-------------------------------------------------- End --------------------------#


    // #---------------------------------------------------- driverlicensebackpic Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="driverlicenseback_image", fileNameProperty="driverlicensebackpic")
     */
    private $driverlicensebackfile;
    /**
     * @var string|null
     *
     * @ORM\Column(name="driverLicenseBackPic", type="string", length=255, nullable=true)
     */

     //upload file

     #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $driverlicensebackpic;

    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $driverlicensebackfileUrl;
     // #-------------------------------------------------- End --------------------------#


    // #---------------------------------------------------- identitycardfrontpic Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="identitycardfront_image", fileNameProperty="identitycardfrontpic")
     */
    private $identitycardfrontfile;
    /**
     * @var string|null
     *
     * @ORM\Column(name="identityCardFrontPic", type="string", length=255, nullable=true)
     */

     //upload file
     
     #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $identitycardfrontpic;


    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $identitycardfrontfileUrl;

     // #-------------------------------------------------- End --------------------------#

    // #---------------------------------------------------- identitycardbackpic Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="identitycardback_image", fileNameProperty="identitycardbackpic")
     */
    private $identitycardbackfile;
    /**
     * @var string|null
     *
     * @ORM\Column(name="identityCardBackPic", type="string", length=255, nullable=true)
     */

     //upload file
     
     #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $identitycardbackpic;

    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $identitycardbackfileUrl;

     // #-------------------------------------------------- End --------------------------#


    // #---------------------------------------------------- identitycardbackpic Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="face_image", fileNameProperty="facepic")
     */
    private $facefile;
     
    /**
     * @var string|null
     *
     * @ORM\Column(name="facePic", type="string", length=255, nullable=true)
     */

     //upload file

     #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $facepic;

    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $facefileUrl;

    // #-------------------------------------------------- End --------------------------#

    /**
     * @var string
     *
     * @ORM\Column(name="referralToken", type="string", length=32, nullable=false)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $referraltoken;

    /**
     * @var string
     *
     * @ORM\Column(name="kycToken", type="string", length=6, nullable=false)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $kyctoken;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="verificationStatusModified", type="boolean", nullable=true)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $verificationstatusmodified = '0';

    // #---------------------------------------------------- picture Upload -------#

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="profil_image", fileNameProperty="picture")
     */
    private $picturefile;
    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $picture;

    /**
    * @var string|null
    */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $picturefileUrl;

    // #-------------------------------------------------- End --------------------------#

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneNumber", type="string", length=50, nullable=true)
     */
    #[
        Groups(['read:collection','read:Userprofile','write:User']),
        Length(min: 8)
    ]
    private $phonenumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    #[Groups(['read:collection'])]
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    #[Groups(['read:collection'])]
    private $updatedat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[
        Groups(['read:collection','read:Userprofile','write:User']),
        Length(min: 2)
    ]
    private $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[
        Groups(['read:collection','read:Userprofile','write:User']),
        Length(min: 10)
    ]
    private $securityquestion;

    /**
     * @ORM\ManyToOne(targetEntity=Userverificationstatus::class)
     */

    #[Groups(['read:collection','read:Userprofile','write:User','write:UserVerify'])]
    private $userverificationstatus;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Timezone::class)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $timezone;

    /**
     * @ORM\ManyToOne(targetEntity=Currency::class)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $basecurrency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $kycfacestatus = "none";

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $kycidcardstatus = "none";

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:collection','read:Userprofile','write:User'])]
    private $kycphonenumberstatus = "none";


    public function __construct()
    {
        $this->userverificationstatuses = new ArrayCollection();
        $this->createdat = new \DateTime();
        $this->updatedat = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPassportpic(): ?string
    {
        return $this->passportpic;
    }

    public function setPassportpic(?string $passportpic): self
    {
        $this->passportpic = $passportpic;

        return $this;
    }

    //getter & setter for passportpicfile

    /**
     * @return File|null 
     */
    public function getPassportpicFile(): ?File
    {
        return $this->passportpicfile;
    }

    /**
     * @param File|null $passportpicfile
     */
    public function setPassportpicFile(?File $passportpicfile): Userprofile
    {
        $this->passportpicfile = $passportpicfile;
        return $this;
    }

    // end getter and setter for passportpicfile

    public function getDriverlicensefrontpic(): ?string
    {
        return $this->driverlicensefrontpic;
    }

    public function setDriverlicensefrontpic(?string $driverlicensefrontpic): self
    {
        $this->driverlicensefrontpic = $driverlicensefrontpic;

        return $this;
    }

     //getter & setter for driverlicensefrontfile

    /**
     * @return File|null 
     */
    public function getDriverlicensefrontFile(): ?File
    {
        return $this->driverlicensefrontfile;
    }

    /**
     * @param File|null driverlicensefrontfile
     */
    public function setDriverlicensefrontFile(?File $driverlicensefrontfile): Userprofile
    {
        $this->driverlicensefrontfile = $driverlicensefrontfile;
        return $this;
    }

    // end getter and setter for driverlicensefrontfile

    public function getDriverlicensebackpic(): ?string
    {
        return $this->driverlicensebackpic;
    }

    public function setDriverlicensebackpic(?string $driverlicensebackpic): self
    {
        $this->driverlicensebackpic = $driverlicensebackpic;

        return $this;
    }

    //getter & setter for driverlicensebackfile

    /**
     * @return File|null 
     */
    public function getDriverlicensebackFile(): ?File
    {
        return $this->driverlicensebackfile;
    }

    /**
     * @param File|null driverlicensebackfile
     */
    public function setDriverlicensebackFile(?File $driverlicensebackfile): Userprofile
    {
        $this->driverlicensebackfile = $driverlicensebackfile;
        return $this;
    }

    // end getter and setter for driverlicensebackfile

    public function getIdentitycardfrontpic(): ?string
    {
        return $this->identitycardfrontpic;
    }

    public function setIdentitycardfrontpic(?string $identitycardfrontpic): self
    {
        $this->identitycardfrontpic = $identitycardfrontpic;

        return $this;
    }

    //getter & setter for identitycardfrontfile

    /**
     * @return File|null 
     */
    public function getIdentitycardfrontFile(): ?File
    {
        return $this->identitycardfrontfile;
    }

    /**
     * @param File|null identitycardfrontfile
     */
    public function setIdentitycardfrontFile(?File $identitycardfrontfile): Userprofile
    {
        $this->identitycardfrontfile = $identitycardfrontfile;
        return $this;
    }

    // end getter and setter for identitycardfrontfile

    public function getIdentitycardbackpic(): ?string
    {
        return $this->identitycardbackpic;
    }

    public function setIdentitycardbackpic(?string $identitycardbackpic): self
    {
        $this->identitycardbackpic = $identitycardbackpic;

        return $this;
    }

    //getter & setter for identitycardbackfile

    /**
     * @return File|null 
     */
    public function getIdentitycardbackFile(): ?File
    {
        return $this->identitycardbackfile;
    }

    /**
     * @param File|null identitycardfrontfile
     */
    public function setIdentitycardbackFile(?File $identitycardbackfile): Userprofile
    {
        $this->identitycardbackfile = $identitycardbackfile;
        return $this;
    }

    // end getter and setter for identitycardbackfile

    public function getFacepic(): ?string
    {
        return $this->facepic;
    }

    public function setFacepic(?string $facepic): self
    {
        $this->facepic = $facepic;

        return $this;
    }

    //getter & setter for facefile

    /**
     * @return File|null 
     */
    public function getFaceFile(): ?File
    {
        return $this->facefile;
    }

    /**
     * @param File|null facefile
     */
    public function setFaceFile(?File $facefile): Userprofile
    {
        $this->facefile = $facefile;
        return $this;
    }

    // end getter and setter for facefile

    public function getReferraltoken(): ?string
    {
        return $this->referraltoken;
    }

    public function setReferraltoken(string $referraltoken): self
    {
        $this->referraltoken = $referraltoken;

        return $this;
    }

    public function getKyctoken(): ?string
    {
        return $this->kyctoken;
    }

    public function setKyctoken(string $kyctoken): self
    {
        $this->kyctoken = $kyctoken;

        return $this;
    }

    public function getVerificationstatusmodified(): ?bool
    {
        return $this->verificationstatusmodified;
    }

    public function setVerificationstatusmodified(?bool $verificationstatusmodified): self
    {
        $this->verificationstatusmodified = $verificationstatusmodified;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    //getter & setter for facefile

    /**
     * @return File|null 
     */
    public function getPictureFile(): ?File
    {
        return $this->picturefile;
    }

    /**
     * @param File|null facefile
     */
    public function setPictureFile(?File $picturefile): Userprofile
    {
        $this->picturefile = $picturefile;
        return $this;
    }

    // end getter and setter for facefile

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(\DateTimeInterface $updatedat): self
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getSecurityquestion(): ?string
    {
        return $this->securityquestion;
    }

    public function setSecurityquestion(?string $securityquestion): self
    {
        $this->securityquestion = $securityquestion;

        return $this;
    }


    public function getUserverificationstatus(): ?Userverificationstatus
    {
        return $this->userverificationstatus;
    }

    public function setUserverificationstatus(?Userverificationstatus $userverificationstatus): self
    {
        $this->userverificationstatus = $userverificationstatus;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTimezone(): ?Timezone
    {
        return $this->timezone;
    }

    public function setTimezone(?Timezone $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getBasecurrency(): ?Currency
    {
        return $this->basecurrency;
    }

    public function setBasecurrency(?Currency $basecurrency): self
    {
        $this->basecurrency = $basecurrency;

        return $this;
    }





    /**
     * Get the value of picturefileUrl
     *
     * @return  string|null
     */ 
    public function getPicturefileUrl()
    {
        return $this->picturefileUrl;
    }

    /**
     * Set the value of picturefileUrl
     *
     * @param  string|null  $picturefileUrl
     *
     * @return  self
     */ 
    public function setPicturefileUrl($picturefileUrl)
    {
        $this->picturefileUrl = $picturefileUrl;

        return $this;
    }

    /**
     * Get the value of facefileUrl
     *
     * @return  string|null
     */ 
    public function getFacefileUrl()
    {
        return $this->facefileUrl;
    }

    /**
     * Set the value of facefileUrl
     *
     * @param  string|null  $facefileUrl
     *
     * @return  self
     */ 
    public function setFacefileUrl($facefileUrl)
    {
        $this->facefileUrl = $facefileUrl;

        return $this;
    }

    /**
     * Get the value of identitycardfrontfileUrl
     *
     * @return  string|null
     */ 
    public function getIdentitycardfrontfileUrl()
    {
        return $this->identitycardfrontfileUrl;
    }

    /**
     * Set the value of identitycardfrontfileUrl
     *
     * @param  string|null  $identitycardfrontfileUrl
     *
     * @return  self
     */ 
    public function setIdentitycardfrontfileUrl($identitycardfrontfileUrl)
    {
        $this->identitycardfrontfileUrl = $identitycardfrontfileUrl;

        return $this;
    }

    /**
     * Get the value of driverlicensefrontfileUrl
     *
     * @return  string|null
     */ 
    public function getDriverlicensefrontfileUrl()
    {
        return $this->driverlicensefrontfileUrl;
    }

    /**
     * Set the value of driverlicensefrontfileUrl
     *
     * @param  string|null  $driverlicensefrontfileUrl
     *
     * @return  self
     */ 
    public function setDriverlicensefrontfileUrl($driverlicensefrontfileUrl)
    {
        $this->driverlicensefrontfileUrl = $driverlicensefrontfileUrl;

        return $this;
    }

        /**
     * Get the value of identitycardbackfileUrl
     *
     * @return  string|null
     */ 
    public function getIdentitycardbackfileUrl()
    {
        return $this->identitycardbackfileUrl;
    }

    /**
     * Set the value of identitycardbackfileUrl
     *
     * @param  string|null  $identitycardbackfileUrl
     *
     * @return  self
     */ 
    public function setIdentitycardbackfileUrl($identitycardbackfileUrl)
    {
        $this->identitycardbackfileUrl = $identitycardbackfileUrl;

        return $this;
    }

    /**
     * Get the value of driverlicensebackfileUrl
     *
     * @return  string|null
     */ 
    public function getDriverlicensebackfileUrl()
    {
        return $this->driverlicensebackfileUrl;
    }

    /**
     * Set the value of driverlicensebackfileUrl
     *
     * @param  string|null  $driverlicensebackfileUrl
     *
     * @return  self
     */ 
    public function setDriverlicensebackfileUrl($driverlicensebackfileUrl)
    {
        $this->driverlicensebackfileUrl = $driverlicensebackfileUrl;

        return $this;
    }

    /**
     * Get the value of passportpicfileUrl
     *
     * @return  string|null
     */ 
    public function getPassportpicfileUrl()
    {
        return $this->passportpicfileUrl;
    }

    /**
     * Set the value of passportpicfileUrl
     *
     * @param  string|null  $passportpicfileUrl
     *
     * @return  self
     */ 
    public function setPassportpicfileUrl(?string $passportpicfileUrl): Userprofile
    {
        $this->passportpicfileUrl = $passportpicfileUrl;

        return $this;
    }

    public function getKycfacestatus(): ?string
    {
        return $this->kycfacestatus;
    }

    public function setKycfacestatus(string $kycfacestatus): self
    {
        $this->kycfacestatus = $kycfacestatus;

        return $this;
    }

    public function getKycidcardstatus(): ?string
    {
        return $this->kycidcardstatus;
    }

    public function setKycidcardstatus(string $kycidcardstatus): self
    {
        $this->kycidcardstatus = $kycidcardstatus;

        return $this;
    }

    public function getKycphonenumberstatus(): ?string
    {
        return $this->kycphonenumberstatus;
    }

    public function setKycphonenumberstatus(string $kycphonenumberstatus): self
    {
        $this->kycphonenumberstatus = $kycphonenumberstatus;

        return $this;
    }
}

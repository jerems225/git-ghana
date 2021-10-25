<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\Model\Operation;
use ApiPlatform\Core\OpenApi\Model\PathItem;
use ApiPlatform\Core\OpenApi\Model\RequestBody;
use ApiPlatform\Core\OpenApi\OpenApi;
use ArrayObject;

class OpenApiFactory implements OpenApiFactoryInterface {

    public function __construct(private OpenApiFactoryInterface $decorated)
    {
        
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);
        // dd($openApi);

        //create a new specifically route in Api
        // $openApi->getPaths()->addPath('/ping', new PathItem(null,'Ping',null,new Operation('ping-id',[],[],'Repond')));

        //security authenticator for access to ressources
        $schemas = $openApi->getComponents()->getSecuritySchemes();

        $schemas['bearerAuth'] = new \ArrayObject([
            'type' => 'http',
            'scheme' => 'bearer',
            'bearerFormat' => 'JWT'
        ]);
 
        // $openApi = $openApi->withSecurity(['bearerAuth' => []]);

        $schemas = $openApi->getComponents()->getSchemas();
        $schemas['Credentials'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'username' => [
                    'type' => 'string',
                    'example' => 'john@doe.fr'
                ],
                'password' => [
                    'type' => 'srting',
                    'example' => '0000'
                ]
             ]
                ]);

        $pathItem = new PathItem(
            post: new Operation(
                operationId: 'postApiLogin',
                tags: ['Authentification & Create User'],
                requestBody: new RequestBody(
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/Credentials'
                            ]
                        ] 
                    ])
                ),
                responses: [
                    '200' => [
                        'description' => 'Utilisateur Logger',
                        'content' => [
                            'application/ld+json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/User-read.collection'
                                ]
                            ] 
                        ]
                    ]
                ]
            )
                                );

        $openApi->getPaths()->addPath('/api_storage/login',$pathItem);

        return $openApi;



       
    }
}
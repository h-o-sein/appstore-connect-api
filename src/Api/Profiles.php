<?php


namespace hosein\AppStore\Api;


class Profiles extends AbstractApi
{

    public function create($name, $bId, $profileType, array $devices = [], array $certificates = [])
    {
        $data = [
            'data' => [
                'type' => 'profiles',
                'relationships' => [
                    'bundleId' => [
                        'data' => [
                            'type' => 'bundleIds',
                            'id' => $bId
                        ],
                    ],
                    'devices' => [
                        'data' => []
                    ],
                    'certificates' => [
                        'data' => []
                    ],
                ],
                'attributes' => [
                    'profileType' => $profileType,
                    'name' => $name
                ]
            ]
        ];
        foreach ($devices as $device) {
            $data['data']['relationships']['devices']['data'][] = [
                'type' => 'devices',
                'id' => $device
            ];
        }
        foreach ($certificates as $certificate) {
            $data['data']['relationships']['certificates']['data'][] = [
                'type' => 'certificates',
                'id' => $certificate
            ];
        }
        return $this->postJson('/profiles', $data);
    }

    public function getProfile($pId, array $params = []) {
        return $this->get('/profiles/' . $pId, $params);
    }

    public function listProfiles(array $params = []) {
        return $this->get('/profiles', $params);
    }

    public function listDevices($pId, array $params = [])
    {
        return $this->get('/profiles/' . $pId . '/devices', $params);
    }

    public function listCertificates($pId, array $params = [])
    {
        return $this->get('/profiles/' . $pId . '/relationships/certificates', $params);
    }

    public function readBundleID($pId, array $params = []) {
        return $this->get('/profiles/' . $pId . '/bundleId', $params);
    }

    public function drop($pId)
    {
        return $this->delete('/profiles/' . $pId);
    }
}
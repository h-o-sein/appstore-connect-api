<?php


namespace hosein\AppStore\Api;


class Device extends AbstractApi
{

    public function register($name, $platform, $udid)
    {
        $data = [
            'data' => [
                'type' => 'devices',
                'attributes' => [
                    'name' => $name,
                    'platform' => strtoupper($platform),
                    'udid' => $udid,
                ]
            ]
        ];
        return $this->postJson('/devices', $data);
    }

    public function listDevices(array $params = []) {
        return $this->get('/devices', $params);
    }

    public function getDevice($DeviceID, array $params = []) {
        return $this->get('/devices/' . $DeviceID, $params);
    }

    public function updateDevice($DeviceID, $Name, $Status = 'ENABLED') {
        $data = [
            'data' => [
                'id' => $DeviceID,
                'type' => 'devices',
                'attributes' => [
                    'name' => $Name,
                    'status' => $Status
                ]
            ]
        ];

        return $this->postJson('/devices/' . $DeviceID, $data);
    }

}
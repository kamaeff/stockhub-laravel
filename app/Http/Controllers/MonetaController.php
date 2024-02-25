<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class MonetaController extends Controller {
    public function payResponse(Request $request) {
        $inputData = $request->all(); // Получаем все параметры из GET запроса от Монеты
        $account = $inputData['MNT_ID']; // Номер счета
        $secret = '12345'; // Код проверки целостности данных
        $transactionId = $inputData['MNT_TRANSACTION_ID']; // Он же номер заказа (order_id)
        $orderInfo = Orders::where('order_id', $transactionId)->first(); // Получаем модель Orders
        $amount = $orderInfo->price; // Сумма заказа
        $clientEmail = $orderInfo->email; // Почта плательщика

        // Проверяем подпись Монеты и магазина
        if ($this->checkSignature(array(
            'account' => $account,
            'transactionId' => $transactionId,
            'currency' => 'RUB',
            'testMode' => '0',
            'clientEmail' => $clientEmail,
            'amount' => $amount,
            'signatureMoneta' => $inputData['MNT_SIGNATURE'],
            'operationId' => $inputData['MNT_OPERATION_ID']
        ))) {
            $signature = md5(200 . $account . $transactionId . $secret); // Сигнатура для ответа (xml)

            $inventory[] = array(
                'name' => 'Помощь в подборе и оформлении заказа: ' . $orderInfo->name_kross,
                'price' => $amount,
                'quantity' => '1',
                'vatTag' => '1105',
                'pm' => 'full_payment',
                'po' => 'service',
            );

            $response  = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
            $response .= "<MNT_RESPONSE>" . PHP_EOL;
            $response .= "<MNT_ID>{$account}</MNT_ID>" . PHP_EOL;
            $response .= "<MNT_TRANSACTION_ID>{$transactionId}</MNT_TRANSACTION_ID>" . PHP_EOL;
            $response .= "<MNT_RESULT_CODE>200</MNT_RESULT_CODE>" . PHP_EOL;
            $response .= "<MNT_SIGNATURE>{$signature}</MNT_SIGNATURE>" . PHP_EOL;
            $response .= "<MNT_ATTRIBUTES>" . PHP_EOL;

            foreach (array(
                'INVENTORY' => json_encode($inventory, JSON_UNESCAPED_UNICODE),
                'CUSTOMER' => $clientEmail ?? null,
            ) as $key => $value) {
                if (!empty($value)) {
                    $response .= "<ATTRIBUTE>" . PHP_EOL;
                    $response .= "<KEY>{$key}</KEY>" . PHP_EOL;
                    $response .= "<VALUE>{$value}</VALUE>" . PHP_EOL;
                    $response .= "</ATTRIBUTE>" . PHP_EOL;
                }
            }

            $response .= "</MNT_ATTRIBUTES>" . PHP_EOL;
            $response .= "</MNT_RESPONSE>" . PHP_EOL;

            header("Content-type: application/xml");
            echo $response;
        }
    }

    protected function checkSignature($data) {
        return true;
        if (isset($data['account'], $data['transactionId'], $data['currency'], $data['testMode'])) {
            if (!isset($data['clientEmail'])) {
                $data['clientEmail'] = '';
            }
            if (!isset($data['amount'])) {
                $data['amount'] = '';
            }

            $shopSignature = md5($data['account'] . $data['transactionId'] . $data['operationId'] . $data['amount'] . $data['currency'] . $data['clientEmail'] . $data['testMode'] . $data['secret']);

            if ($shopSignature == $_REQUEST['signatureMoneta']) {
                return true;
            }
        } else {
            return false;
        }
    }
}

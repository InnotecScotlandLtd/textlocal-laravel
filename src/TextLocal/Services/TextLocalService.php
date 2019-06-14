<?php
/**
 * This file is part of the TextLocal package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TextLocal\Services;

use InvalidArgumentException;

/**
 * Trait TextLocalTrait
 * @package TextLocal\Traits
 */
class TextLocalService
{
    protected $mobileNumbers;
    protected $message;
    protected $case;
    protected $sender;
    protected $test;

    /**
     * TextLocalTrait constructor.
     * @param $mobileNumbers
     * @param $message
     * @param $case
     */
    public function __construct($mobileNumbers, $message, $case)
    {
        $this->mobileNumbers = is_array($mobileNumbers) ? $mobileNumbers : [$mobileNumbers];
        $this->message = rawurlencode($message);
        $this->case = $case;
        $this->sender = urlencode(config('textlocal.textlocal.sender'));
        $this->test = urlencode(config('textlocal.textlocal.test'));
        $this->testNumbers = config('textlocal.textlocal.test_numbers');
    }

    /**
     * @return $this
     */
    public function sendText()
    {
        $url = 'https://api.txtlocal.com/send/';
        if ($this->test) {
            $this->mobileNumbers = $this->testNumbers;
        }
        foreach ($this->mobileNumbers as $number) {
            $data = ['apikey' => config('textlocal.textlocal.key'), 'numbers' => $number, 'sender' => $this->sender, 'message' => $this->message];
            $curl = $this->initiateCurl($url, $data);
            $this->executeCurl($curl);
        }
        return $this;
    }

    /**
     * @param $template
     * @param $contactLinks
     * @param string $table
     * @return $this
     */
    public function addCaseCall($template, $contactLinks, $table = '')
    {
        $table = (!empty($table)) ? $table : 'case_calls';
        if (!$this->test && $contactLinks !== '') {
            \DB::table($table)->insert(
                [
                    'note' => 'SMS ' . $template . ' sent to' . $contactLinks,
                    'call_type_id' => 15,
                    'case_id' => $this->case->id,
                ]
            );
        }
        return $this;
    }

    /**
     * @param $url
     * @param $data
     * @param array $headers
     * @return false|resource
     */
    public function initiateCurl($url, $data, $headers = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        return $curl;
    }

    /**
     * @param $curl
     * @return bool|string
     */
    public function executeCurl($curl)
    {
        return curl_exec($curl);
    }

    /**
     * @param $curl
     */
    public function closeCurl($curl)
    {
        return curl_close($curl);
    }
}
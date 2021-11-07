<?php

namespace common\models;

use yii\base\Model;

class ApiConnectors extends Model{

    const patreon_auth_url = 'https://www.patreon.com/oauth2/authorize?response_type=code&client_id=NlFVTPVIyuNtijM40roCP3-98j3lHL1h5bQdxFYhWcJHAupBCn363_Xco17sO3Lf&redirect_uri=http://test.jonjdigital.com/link/patreon';
    const patreon_client_id = 'NlFVTPVIyuNtijM40roCP3-98j3lHL1h5bQdxFYhWcJHAupBCn363_Xco17sO3Lf';
    const patreon_client_secret = '2pGOYu0zbHPiuzIaCNoinU1ga5T1OYGMTXO_goWLD6YobE6iwnHE3M932w2NwLA6';
    const patreon_redirect = 'http://test.jonjdigital.com/link/patreon';
}
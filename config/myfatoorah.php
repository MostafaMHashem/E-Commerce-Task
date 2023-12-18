<?php

return [
    'fatoora_base_url' => 'https://apitest.myfatoorah.com/',
    /**
     * API Token Key (string)
     * Accepted value:
     * Live Token: https://myfatoorah.readme.io/docs/live-token
     * Test Token: https://myfatoorah.readme.io/docs/test-token
     */
    // 'api_key' => 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL',
    // the next if for our test account
    'api_key' => 'hWtb03Ep3iUIu02wVb5C8JD0w1j50-2sGvLG16jVx5O3vae43sfm85AEOlulpemT2qhcIgeDXH79x-1Obogz-DSp2J_JCYLzDBJO80FJB5MzI9DF9KZR1DFrz0aCFb1IA69wWiwwB_8JfpTVTj3IWqG_E-1pB8i11bC7bEZKVcfEBKpq3PmUw-Th01pDCumBAyCswizeq5wihXo1P68pyQh8Z8ISo_cXMbNVHz_4pdoDOJYqUKQriwk1M_yEOLuFnfEgtEgIO__mFgw3o9pzQj0kTBSb203CIiHMStNoeE-RPhWH82hho7Qa1gK56-Desx9kMLQJeLQY2dBOv--q8px65obpnCRU6KaJ_Dy2ZReTiBCiKB46nTh7l2Dt4-7oiry6i8LuUsg08xAE7ZB97GS5g4Og16EtBbPzwLR0_o9vdM9sWdnsAyDT4KBDNNw9WFpkn5bQ--Uk0n8q8fcNuvQRFrJ6M4S9Esb06Gj7PD6o8GXhEzXYX5aN7CNzHZaEwdR5taGVM6_PfsUb3eR1JXkMTHuakC0BF5SmbECp9d0Zyo0Yxo-7SY3-ykSVBNhJEg1ec1Ojh3MGZoC8ABU6ygMGl-EnkGhfNk2-WuL2yxZdKr0YVQF0qJIsyBavpcXmsF6jy9oVEcBG9XP1nZYVRfXVmYSmJ1DgWeQLVNWrWo_pPPtKokwJaaDRWfYR_W4aHGZU0A',
    /**
     * Test Mode (boolean)
     * Accepted value: true for the test mode or false for the live mode
     */
    'test_mode' => true,
    /**
     * Country ISO Code (string)
     * Accepted value: KWT, SAU, ARE, QAT, BHR, OMN, JOD, or EGY.
     */
    'country_iso' => 'KWT',
    /**
     * Save card (boolean)
     * Accepted value: true if you want to enable save card options.
     * You should contact your account manager to enable this feature in your MyFatoorah account as well.
     */
    'save_card' => true,
    /**
     * Webhook secret key (string)
     * Enable webhook on your MyFatoorah account setting then paste the secret key here.
     * The webhook link is: https://{example.com}/myfatoorah/webhook
     */
    'webhook_secret_key' => '',
    /**
     * Register Apple Pay (boolean)
     * Set it to true to show the Apple Pay on the checkout page.
     * First, verify your domain with Apple Pay before you set it to true.
     * You can either follow the steps here: https://docs.myfatoorah.com/docs/apple-pay#verify-your-domain-with-apple-pay or contact the MyFatoorah support team (tech@myfatoorah.com).
    */
    'register_apple_pay' => false
];

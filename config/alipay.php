<?php
return [
    //应用ID,您的APPID。
    'app_id' => "2016092600603502",

    //商户私钥
    'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC2lrUiQcIbflDcauzUupuS0KFeP/g3RInV73GbCEzsrIPP4o6CZuSJrMpKOGf0VGYZeX3k8goiyEZ4tey802FHOh2wUKBxp6GlwybA/VSuY8OpXMbYccUeeQkjmBmRGlTGyVommdGaKjVGmNHx7vPfdR5AW2Zh9B5sYWdor5XhKB5FH/garVySO+CaKVI8HS+e6hH7u2fTLsJpTUyYoIKh6ogC3s8f4/GhPNpgOQCTFbisMNckCaFnC0v7vhytUYLKr9le2CaCVJQyGZpiMmgcZAUaPSKGU1sVrXc9NtBQd+4VO9wEf+HABXhxqyCRCb7zZhfPTSCrCEF//qIttN9HAgMBAAECggEAaeC8im/dUjoOQ7KRQM4w9pKacF/h3JKW5wKhOwg2Kyvih4LVppJpxdf3udA5n7ntNqp3sXIVJJREIS1FaT2d9EKkAqDOWPmex9OBPnnoR/O7+xK8j7hxWLlQ7l39vWGqdVc/OpEJtT7yg8yMOaGZsyNj9mfJ19VKawiUgWUIIXY6K8GD5SAIxH1fWuc1b13loa0CxlAqGQSXXCnSTL0B0zpeLZ0mOvSTc/iyj1CnrgpbtV0ZEy9ufydD9tToTEqEV6oEjLMVcPv/mUSqU4hMkHCJ1VqODcG6oLhZB2IEU00bj8cdJPCcUcOahUYAY9DWe/+/g18bBCqvb0XHUBHYeQKBgQDfw5vGREWlUA+7X6qZ+smWsXOVVhtDGWzW3jOqJudska9iSBFatEksPiQ1AMAd/S0f2ArAUOdGlgBpSvnuMNAWYSXP44qm1Jm3xPT6/RZZiuCAQ3RNmd/MZnITqRrzZl5q3qKfhjE04F2FDanJjlBQVvX86MPBN92cTqzDuVtj5QKBgQDQ5I5Ej2Xuc8jQFh8yU6Ptidy20BW+QiSXTPu/yKjlIRc6BQOn+rZJPyZ6kgGt7FQVT5RaVYn9ALXTSK1/4vdRcFjheEmOmxgl9UZ+23SjhEhu0ZhM9LK24/iBfw68YDz3eCNpemUqhEx5+elcYy/QYFJOku9RS4g6khQnV6bbuwKBgFiRQBMV6ssoCVIM56XS0f/HdQxi7J9+bMoPYTuz8l3SvCyWgef4/A16+zHPfjtgfn/gL0E3xJL3xGnot0xEHdj90s2aLsMh20YVuzGtAy+l/H5INLySbzakRfrqMDSvDCgYvx2NK+TV+a40XkPdBIUIJo1YREMyLZE0wsUllLrRAoGAHch4gE3xuo3Hk+OTjxldxgBh966zau0DSo8vVajGa+TL6vnMC6czVj4qvk8S7jlDw8YU4MxRYEE5q2YxVoqFuJbMFVmRI0P5rW/LHUss1iOGMEax8EbzNCBMzinPcAxIpP/8DI3m3qj+PmXjX8jEiHEzSwCoHm8mfTNWrEVTBQECgYEAxrRApgRY4eql/k7WuzvePJ1Sg37VUqJTBWwgCWuK3SIU+s644oDgPV6HQXHcG2yEumxhDLNUiD4YH58SJTSUepGQvy+d3i6lZwuXpxALtvOqU750AoBDjZ+ZyCf255KC41o5fmSMMsFlNiubRRnzf4/3othMPqpk1cNk8gEzo3o=",

    //异步通知地址
    'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify",

    //同步跳转
    'return_url' => "http://www.zhu.com/successpay",
    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuUFiaQaUWFh7HbzpxBkemddJvKi+JHuuiUuvT9uPJZYitK/adTB91fWPVpq0dqJdLduR0/fbkTVDOThI83aKeJfh7FIcb0kEkZ4ZEoz+DR0y8IjsVwXa+z4m3Qq/25dTNJojMnJGnEEwQbeYIiNL+BhRSGAYza1/RO/HFosJRklEa+ryxTzmvqgTaYdsiWwTuFMivPk4PtVDO1zVWRHfAnyggM1Oq698yvemv2QbcFC7+13/cKqmtvi85K01kt7ILxDGJ3s2PbOHm4o4fvQoOMDQjACPj7z2xZoQJJxAcOcSXaEbiT/dcaZ1h3B47j6wSwR44Dc1g1sKoFyPk7+2+QIDAQAB",
];
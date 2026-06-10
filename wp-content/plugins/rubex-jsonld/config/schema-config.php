<?php

if (!defined('ABSPATH')) {
    exit;
}

return array(
    'defaults' => array(
        '@context' => 'https://schema.org',
        'inLanguage' => 'ru-RU',
        'pretty_print' => false,
    ),

    'enabled_types' => array(
        'organization' => true,
        'website' => true,
        'article' => true,
        'breadcrumb' => true,
    ),

    'organization' => array(
        'name' => 'Компания RubEx Group',
        'url' => home_url('/'),
        'logo' => 'https://rubexgroup.ru/wp-content/uploads/2020/04/RubEx_1.svg',
        'phone' => '+7 800 505-98-70',
        'email' => 'contacts@rubexgroup.ru',
        'address' => [
            "@type" => "PostalAddress",
            "postalCode" => "123610",
            "addressCountry" => "RU",
            "addressLocality" => "Москва",
            "streetAddress" => "Краснопресненская набережная, д. 12, офис 1002"
        ],
        'contactPoint' =>[
            [
                "@type" => "ContactPoint",
                "telephone" => "+7-800-505-98-70",
                "email" => "contact@rubexgroup.ru",
                "contactType" => "customer support",
                "areaServed" => "RU",
                "availableLanguage" => ["ru"]
            ],
            [
                "@type" => "ContactPoint",
                "telephone" => "+7-495-258-14-28",
                "email" => "info-uk@rubexgroup.ru",
                "contactType" => "head office",
                "areaServed" => "RU",
                "availableLanguage" => ["ru"]
            ]
        ],
         "subOrganization" => [
            [
                "@type" => "Organization",
                "@id" => "https://rubexgroup.ru/#kurskrezinotekhnika",
                "name" => "ОАО «Курскрезинотехника»",
                "address" => [
                    "@type" => "PostalAddress",
                    "postalCode" => "305018",
                    "addressCountry" => "RU",
                    "addressLocality" => "Курск",
                    "streetAddress" => "проспект Ленинского комсомола, 2"
                ],
                "telephone" => "+7-471-273-03-40",
                "email" => "kursk@rubexgroup.ru"
            ],
            [
                "@type" => "Organization",
                "@id" => "https://rubexgroup.ru/#saransk-rezinotekhnika",
                "name" => "ОАО «Саранский завод «Резинотехника»",
                "address" => [
                    "@type" => "PostalAddress",
                    "addressCountry" => "RU",
                    "addressRegion" => "Республика Мордовия",
                    "addressLocality" => "Саранск",
                    "streetAddress" => "Северо-восточное шоссе, 15"
                ],
                "telephone" => "+7-834-238-04-13",
                "email" => "saransk@rubexgroup.ru"
            ]
        ],
        'description' => 'RubEx Group — резинотехнический холдинг, производитель и поставщик резинотехнической продукции для промышленности и сельского хозяйства: конвейерных лент, промышленных рукавов, гидравлических рукавов, ПВХ-рукавов, резиновых смесей, технических пластин, формовых и неформовых РТИ.',
        'legalName' => 'ООО "Рабекс Групп"',
        'areaServed' => 'RU',
        'sameAs' => array(
            'https://vk.com/rubexgroup',
        ),
    ),

    'website' => array(
        'name' => get_bloginfo('name'),
        'url' => home_url('/'),
        'description' => 'Резинотехнические изделия всех типов от производителя. Оптовая продажа и поставки резинотехнических изделий по РФ и ближнему зарубежю. Все виды РТИ по оптовым ценам с гарантией качества. ',
        'inLanguage' => ['ru-RU', 'en-US'],
        'alternateName' => 'RubEx Group',
    ),

    'about_page' => array(
        '@context' => 'https://schema.org',
        '@graph' => array(
            array(
                '@type' => 'AboutPage',
                '@id' => 'https://rubexgroup.ru/o-kompanii/#webpage',
                'url' => 'https://rubexgroup.ru/o-kompanii/',
                'name' => 'О компании RubEx Group',
                'description' => 'Информация о холдинге RubEx Group, производственных площадках, истории предприятий, команде и направлениях деятельности.',
                'isPartOf' => array(
                    '@id' => 'https://rubexgroup.ru/#website',
                ),
                'about' => array(
                    '@id' => 'https://rubexgroup.ru/#organization',
                ),
                'breadcrumb' => array(
                    '@id' => 'https://rubexgroup.ru/o-kompanii/#breadcrumb',
                ),
                'inLanguage' => 'ru-RU',
            ),
            array(
                '@type' => 'BreadcrumbList',
                '@id' => 'https://rubexgroup.ru/o-kompanii/#breadcrumb',
                'itemListElement' => array(
                    array(
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Главная',
                        'item' => 'https://rubexgroup.ru/',
                    ),
                    array(
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'О компании',
                        'item' => 'https://rubexgroup.ru/o-kompanii/',
                    ),
                ),
            ),
        ),
    ),

    'contacts_page' => array(
        '@context' => 'https://schema.org',
        '@graph' => array(
            array(
                '@type' => 'ContactPage',
                '@id' => 'https://rubexgroup.ru/kontakty/#webpage',
                'url' => 'https://rubexgroup.ru/kontakty/',
                'name' => 'Контакты RubEx Group',
                'description' => 'Контакты всех подразделений холдинга RubEx Group: контакт-центр, управляющая компания, производственные площадки, территориальные подразделения и розничные магазины.',
                'isPartOf' => array(
                    '@id' => 'https://rubexgroup.ru/#website',
                ),
                'about' => array(
                    '@id' => 'https://rubexgroup.ru/#organization',
                ),
                'breadcrumb' => array(
                    '@id' => 'https://rubexgroup.ru/kontakty/#breadcrumb',
                ),
                'inLanguage' => 'ru-RU',
            ),
            array(
                '@type' => 'Organization',
                '@id' => 'https://rubexgroup.ru/#organization',
                'name' => 'RubEx Group',
                'url' => 'https://rubexgroup.ru/',
                'telephone' => '+7-800-505-98-70',
                'email' => 'contact@rubexgroup.ru',
                'contactPoint' => array(
                    array(
                        '@type' => 'ContactPoint',
                        'telephone' => '+7-800-505-98-70',
                        'email' => 'contact@rubexgroup.ru',
                        'contactType' => 'Контакт-центр',
                        'areaServed' => 'RU',
                        'availableLanguage' => array('ru'),
                    ),
                ),
                'department' => array(
                    array(
                        '@type' => 'LocalBusiness',
                        '@id' => 'https://rubexgroup.ru/kontakty/#head-office',
                        'name' => 'Управляющая компания RubEx Group',
                        'address' => array(
                            '@type' => 'PostalAddress',
                            'addressCountry' => 'RU',
                            'addressLocality' => 'Москва',
                            'streetAddress' => 'Краснопресненская наб., д. 12, подъезд 3, оф. №1002',
                        ),
                        'telephone' => '+7-495-258-14-28',
                        'email' => 'info-uk@rubexgroup.ru',
                    ),
                    array(
                        '@type' => 'LocalBusiness',
                        '@id' => 'https://rubexgroup.ru/kontakty/#moscow-office',
                        'name' => 'Территориальное подразделение ООО «Рабэкс Трэйд» по городу Москве',
                        'address' => array(
                            '@type' => 'PostalAddress',
                            'addressCountry' => 'RU',
                            'addressLocality' => 'Москва',
                            'streetAddress' => 'Краснопресненская наб., д. 12, подъезд 3, оф. №1002',
                        ),
                        'telephone' => '+7-495-780-97-25',
                        'email' => 'td-msk@rubexgroup.ru',
                    ),
                    array(
                        '@type' => 'LocalBusiness',
                        '@id' => 'https://rubexgroup.ru/kontakty/#kursk-plant',
                        'name' => 'ОАО «Курскрезинотехника»',
                        'address' => array(
                            '@type' => 'PostalAddress',
                            'addressCountry' => 'RU',
                            'addressLocality' => 'Курск',
                            'streetAddress' => 'пр-т Ленинского комсомола, 2',
                        ),
                        'telephone' => '+7-471-273-03-40',
                        'email' => 'kursk@rubexgroup.ru',
                    ),
                    array(
                        '@type' => 'LocalBusiness',
                        '@id' => 'https://rubexgroup.ru/kontakty/#saransk-plant',
                        'name' => 'ОАО «Саранский завод «Резинотехника»',
                        'address' => array(
                            '@type' => 'PostalAddress',
                            'addressCountry' => 'RU',
                            'addressRegion' => 'Республика Мордовия',
                            'addressLocality' => 'Саранск',
                            'streetAddress' => 'Северо-восточное шоссе, 15',
                        ),
                        'telephone' => '+7-834-238-04-13',
                        'email' => 'saransk@rubexgroup.ru',
                    ),
                ),
            ),
            array(
                '@type' => 'BreadcrumbList',
                '@id' => 'https://rubexgroup.ru/kontakty/#breadcrumb',
                'itemListElement' => array(
                    array(
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Главная',
                        'item' => 'https://rubexgroup.ru/',
                    ),
                    array(
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Контакты',
                        'item' => 'https://rubexgroup.ru/kontakty/',
                    ),
                ),
            ),
        ),
    ),

    'requizites_page' => array(
        '@context' => 'https://schema.org',
        '@graph' => array(
            array(
                '@type' => 'WebPage',
                '@id' => 'https://rubexgroup.ru/rekvizity-i-dokumenty-rubex/#webpage',
                'url' => 'https://rubexgroup.ru/rekvizity-i-dokumenty-rubex/',
                'name' => 'Реквизиты и документы RubEx Group',
                'description' => 'Реквизиты и учредительные документы RubEx Group, ОАО «Курскрезинотехника» и ОАО «Саранский завод «Резинотехника».',
                'isPartOf' => array(
                    '@id' => 'https://rubexgroup.ru/#website',
                ),
                'about' => array(
                    '@id' => 'https://rubexgroup.ru/#organization',
                ),
                'breadcrumb' => array(
                    '@id' => 'https://rubexgroup.ru/rekvizity-i-dokumenty-rubex/#breadcrumb',
                ),
                'inLanguage' => 'ru-RU',
            ),
            array(
                '@type' => 'Organization',
                '@id' => 'https://rubexgroup.ru/#organization',
                'name' => 'RubEx Group',
                'legalName' => 'ООО «Рабэкс Групп»',
                'url' => 'https://rubexgroup.ru/',
                'telephone' => '+7-800-505-98-70',
                'taxID' => '7703787360',
                'address' => array(
                    '@type' => 'PostalAddress',
                    'postalCode' => '123610',
                    'addressCountry' => 'RU',
                    'addressLocality' => 'Москва',
                    'streetAddress' => 'Краснопресненская набережная, д. 12, офис 1002',
                ),
                'subOrganization' => array(
                    array(
                        '@type' => 'Organization',
                        '@id' => 'https://rubexgroup.ru/#kurskrezinotekhnika',
                        'name' => 'ОАО «Курскрезинотехника»',
                        'taxID' => '4632001454',
                        'address' => array(
                            '@type' => 'PostalAddress',
                            'postalCode' => '305018',
                            'addressCountry' => 'RU',
                            'addressLocality' => 'Курск',
                            'streetAddress' => 'проспект Ленинского комсомола, 2',
                        ),
                    ),
                    array(
                        '@type' => 'Organization',
                        '@id' => 'https://rubexgroup.ru/#saransk-rezinotekhnika',
                        'name' => 'ОАО «Саранский завод «Резинотехника»',
                        'taxID' => '1328028538',
                        'address' => array(
                            '@type' => 'PostalAddress',
                            'postalCode' => '430031',
                            'addressCountry' => 'RU',
                            'addressRegion' => 'Республика Мордовия',
                            'addressLocality' => 'Саранск',
                            'streetAddress' => 'Октябрьский район, Северо-восточное шоссе, дом 15',
                        ),
                    ),
                ),
            ),
            array(
                '@type' => 'BreadcrumbList',
                '@id' => 'https://rubexgroup.ru/rekvizity-i-dokumenty-rubex/#breadcrumb',
                'itemListElement' => array(
                    array(
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Главная',
                        'item' => 'https://rubexgroup.ru/',
                    ),
                    array(
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Реквизиты и документы',
                        'item' => 'https://rubexgroup.ru/rekvizity-i-dokumenty-rubex/',
                    ),
                ),
            ),
        ),
    ),
);

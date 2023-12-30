<?php
return [
    'plugin' => [
        'name' => 'Rezerwacje',
        'description' => 'Plugin do zarządzania rezerwacjami'
    ],
    'misc' => [
        'empty_option' => '- Wybierz -',
        'notification' => [
            'label' => 'Metoda powiadomień',
            'phone' => 'Telefon',
            'email' => 'Email',
            'both' => 'Telefon + mail',
            'no_email' => 'Wybrany użytkownik nie posiada zapisanego adresu email. Wybierz inną metodę powiadomień',
        ],
        'currency' => [
            'pln' => 'PLN (polski złoty)',
            'eur' => 'EUR (euro)',
            'usd' => 'USD (dolar amer.)',
            'gbp' => 'GBP (funt szterling)'
        ],
    ],
    'navigation' => [
        'reservations' => [
            'label' => 'Rezerwacje',
        ],
        'client' => [
            'label' => 'Klienci',
        ],
        'reservation' => [
            'label' => 'Rezerwacje',
            'service_types' => 'Rodzaje usług',
        ],
        'employees' => 'Pracownicy',
    ],
    'settings' => [
        'label' => 'Zarządzaj',
        'description' => 'Ustawienia pluginu Rezerwacje',
        'category' => 'Rezerwacje',
        'tab' => [
            'opening_hours' => 'Godziny otwarcia',
            'about' => 'Dane firmy',
            'general' => 'Ogólne',
        ],
        'section_opening_hours' => [
            'label' => 'Godziny otwarcia',
            'comment' => 'Wprowadź godziny otwarcia zakładu w formacie np. "9:00-17:00"',
            'monday' => 'Poniedziałek',
            'tuesday' => 'Wtorek',
            'wednesday' => 'Środa',
            'thursday' => 'Czwartek',
            'friday' => 'Piątek',
            'saturday' => 'Sobota',
            'sunday' => 'Niedziela',
            'sunday_default' => 'Zamknięte',
        ],
        'about' => [
            'company_name' => 'Nazwa firmy',
            'section_address' => 'Dane adresowe',
            'section_logo' => 'Logo',
            'street' => 'Ulica',
            'building_no' => 'Nr budynku',
            'city' => 'Miejscowość',
            'postcode' => 'Kod pocztowy',
            'region' => 'Województwo',
            'logo' => 'Prześlij obraz',
            'logo_comment' => 'Obraz nie powinien przekraczać wymiarów 200 x 200 px',
        ],
        'general' => [
            'currency_label' => 'Waluta',
            'currency_label_comment' => 'Wybierz, w jakiej walucie będą przedstawiane ceny',
            'daily_reminder' => 'Codzienny mail',
            'daily_reminder_comment' => 'Włącz tą opcję, jeśli chcesz otrzymywać e-mail z rozkładem rezerwacji na dany dzień',
            'frequency' => 'Częstotliwość',
            'frequency_comment' => 'Wybierz jak często chcesz otrzymywać e-mail',
            'hour_sent' => 'Godzina',
            'hour_sent_comment' => 'Wybierz kiedy chcesz otrzymywać e-mail',
            'frequency_daily' => 'Codziennie',
            'frequency_weekly' => 'Tygodniowo',
            'frequency_monthly' => 'Miesięcznie',
            'frequency_custom' => 'Niestandardowe',
            'frequency_custom_label' => 'Dodaj niestandardowy czas wysyłki',
            'frequency_custom_unit' => 'Wybierz jednostkę czasu',
            'frequency_custom_frequency' => 'Wybierz częstotliwość wysyłki',
            'frequency_custom_hour_sent' => 'Wybierz godzinę wysyłki',
            'frequency_day' => 'Dzień',
            'frequency_week' => 'Tydzień',
            'frequency_month' => 'Miesiąc',
        ],
    ],
    'models' => [
        'client' => [
            'first_name' => 'Imię',
            'last_name' => 'Nazwisko',
            'phone_no' => 'Nr telefonu',
            'email' => 'Email',
            'reservations' => 'Rezerwacje użytkownika',
        ],
        'reservation' => [
            'client' => 'Klient',
            'service' => 'Rodzaj usługi',
            'employee' => 'Pracownik',
            'date' => 'Termin',
            'hour' => 'Dostępne godziny',
            'additional_informations' => 'Dodatkowe informacje',
            'revoke' => 'Actions',
            'start' => 'Godzina',
        ],
        'employee' => [
            'first_name' => 'Imię',
            'last_name' => 'Nazwisko',
            'phone_no' => 'Nr telefonu',
            'email' => 'Email',
            'avatar' => 'Prześlij zdjęcie',
        ],
        'service_type' => [
            'name' => 'Nazwa usługi',
            'length' => 'Długość trwania usługi',
            'length_comment' => 'Podaj czas w minutach',
            'price' => 'Cena',
            'price_comment' => 'Cena w PLN, wprowadź tylko wartość',
            'additional_informations' => 'Dodatkowe informacje',
        ],
    ],
    'controllers' => [
        'clients' => [
            'reservations' => 'Rezerwacje',
        ]
    ]
];

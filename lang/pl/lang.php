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
        ],
        'settings' => [
            'label' => 'Zarządzaj',
            'description' => 'Ustawienia pluginu Rezerwacje',
            'category' => 'Rezerwacje',
            'tab' => [
                'opening_hours' => 'Godziny otwarcia',
                'about' => 'Dane firmy',
                'employees' => 'Pracownicy',
            ],
            'section_opening_hours' => [
                'label' => 'Godziny otwarcia',
                'comment' => 'Wprowadź godziny otwarcia zakładu',
                'monday' => 'Poniedziałek',
                'tuesday' => 'Wtorek',
                'wednesday' => 'Środa',
                'thursday' => 'Czwartek',
                'friday' => 'Piątek',
                'saturday' => 'Sobota',
                'sunday' => 'Niedziela',
                'sunday_default' => 'Zamknięte',
            ],
            'employees' => [
                'prompt' => 'Dodaj nowego pracownika',
                'first_name' => 'Imię',
                'last_name' => 'Nazwisko',
                'phone_no' => 'Nr telefonu',
                'email' => 'Email',
                'avatar' => 'Prześlij zdjęcie',
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
        ],
        'models' => [
            'client' => [
                'first_name' => 'Imię',
                'last_name' => 'Nazwisko',
                'phone_no' => 'Nr telefonu',
                'email' => 'Email',
            ],
            'reservation' => [
                'client' => 'Klient',
                'service' => 'Rodzaj usługi',
                'date' => 'Termin',
                'additional_informations' => 'Dodatkowe informacje',
            ]
        ]
    ];
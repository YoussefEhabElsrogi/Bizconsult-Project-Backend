@php
    // Getting the current locale
    $locale = LaravelLocalization::getCurrentLocale() === 'ar' ? 'en' : 'ar';

    // Setting the button text based on the locale
    $button = $locale === 'ar' ? 'Arbic' : 'English';
@endphp

<!-- Language switcher link -->
<a class="nav-link my-2 text-primary" style="font-size: 20px;" href="{{ LaravelLocalization::getLocalizedURL($locale) }}"
    id="langSwitcher">
    {{ strtoupper($button) }}
</a>

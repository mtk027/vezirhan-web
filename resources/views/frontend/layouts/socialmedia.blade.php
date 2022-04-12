@if (config('settings.social.facebook'))
    <a href="{{config('settings.social.facebook')}}" class="facebook" target="_blank"
        rel="noopener noreferrer">
        <i class="fab fa-facebook-f"></i>
    </a>
@endif
@if (config('settings.social.instagram'))
    <a href="{{config('settings.social.instagram')}}" class="instagram" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-instagram"></i>
    </a>
@endif
@if (config('settings.social.twitter'))
    <a href="{{config('settings.social.twitter')}}" class="twitter" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-twitter"></i>
    </a>
@endif
@if (config('settings.social.youtube'))
    <a href="{{config('settings.social.youtube')}}" class="youtube" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-youtube"></i>
    </a>
@endif

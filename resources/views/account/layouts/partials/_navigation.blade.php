<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link{{ return_if(on_page('account'), ' active') }}"  
       href="{{ route('account.index') }}" role="tab"
    >Account overview</a>
    <a class="nav-link{{ return_if(on_page('*/profile'), ' active') }}" 
       href="{{ route('account.profile.index') }}"
    >Profile</a>
    <a class="nav-link{{ return_if(on_page('*/password'), ' active') }}"
       href="{{ route('account.password.index') }}"
    >Change Password</a>
</div>
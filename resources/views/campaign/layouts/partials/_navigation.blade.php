<div class="card mb-3">
	<div class="card-header">
		Campaigning
	</div>
	<div class="card-body">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		    <a class="nav-link{{ return_if(on_page('dashboard'), ' active') }}"  
		       href="{{ route('dashboard') }}" role="tab"
		    >Manage Campaign</a>
		    <a class="nav-link{{ return_if(on_page('mailings'), ' active') }}"  
		       href="{{ route('mailings.index') }}" role="tab"
		    >Mailing Lists</a>
		</div>
	</div>
</div>
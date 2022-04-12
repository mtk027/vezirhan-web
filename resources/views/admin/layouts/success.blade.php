@if(Session::has('success'))
    <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
			    <rect opacity="0.25" x="3" y="21" width="18" height="2" rx="1" fill="#191213"></rect>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M4.08576 11.5L3.58579 12C3.21071 12.375 3 12.8838 3 13.4142V17C3 18.1045 3.89543 19 5 19H8.58579C9.11622 19 9.62493 18.7893 10 18.4142L10.5 17.9142L4.08576 11.5Z" fill="#121319"></path>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 10.0858L11.5858 4L18 10.4142L11.9142 16.5L5.5 10.0858Z" fill="#121319"></path>
				<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M18.1214 1.70705C16.9498 0.535476 15.0503 0.535476 13.8787 1.70705L13 2.58576L19.4142 8.99997L20.2929 8.12126C21.4645 6.94969 21.4645 5.0502 20.2929 3.87862L18.1214 1.70705Z" fill="#191213"></path>
			</svg>
		</span>
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <h4 class="fw-bold">Başarılı!</h4>
            <span>{{Session::get('success')}}</span>
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1 svg-icon-success">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z" fill="#12131A"></path>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 8.29289C8.68342 7.90237 9.31658 7.90237 9.70711 8.29289L12 10.5858L14.2929 8.29289C14.6834 7.90237 15.3166 7.90237 15.7071 8.29289C16.0976 8.68342 16.0976 9.31658 15.7071 9.70711L13.4142 12L15.7071 14.2929C16.0976 14.6834 16.0976 15.3166 15.7071 15.7071C15.3166 16.0976 14.6834 16.0976 14.2929 15.7071L12 13.4142L9.70711 15.7071C9.31658 16.0976 8.68342 16.0976 8.29289 15.7071C7.90237 15.3166 7.90237 14.6834 8.29289 14.2929L10.5858 12L8.29289 9.70711C7.90237 9.31658 7.90237 8.68342 8.29289 8.29289Z" fill="#12131A"></path>
				</svg>
			</span>
        </button>
    </div>
@endif


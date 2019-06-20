<div class="card profile">
    <div class="card-header text-white bg-aau">
        <span>Profile</span>
        <span><a href="{{ route('admin::profile::editForm', ['id' => Auth::user()->id]) }}" class="edit-link-white"><i class="fas fa-edit"></i></a></span>
    </div>

    <div class="card-body">
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                First name
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->firstname }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Last name
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->lastname }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Date of Birth
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->date_of_birth->toDateString() }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                E-mail
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->email }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Phone number
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->phone_number }}
            </div>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title mb-2 text-aau">Education</h5>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Education
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->education }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Study number
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->study_number }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Study card number
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->study_card_number }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Alumni
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->alumni ? 'Yes' : 'No' }}
            </div>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title mb-2 text-aau">Address</h5>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Zip
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->address->zip }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                City
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->address->city }}
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Address
            </div>
            <div class="profile-item-text col-lg-6">
                {{ Auth::user()->address->address }}
            </div>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title mb-2 text-aau">Car</h5>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Driver's License
            </div>
            <div class="profile-item-text col-lg-6">
                @if(Auth::user()->drivers_license)
                    {{ Auth::user()->drivers_license->license_number }}
                @else
                    No
                @endif
            </div>
        </div>
        <div class="profile-item row">
            <div class="profile-item-title col-lg-6">
                Has Car?
            </div>
            <div class="profile-item-text col-lg-6">
                @if(Auth::user()->car)
                    Yes{{ Auth::user()->car->towbar ? ', with tow' : '' }}
                @else
                    No
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title mb-2 text-aau">Contact persons</h5>
        @foreach(Auth::user()->contactPersons as $contactPerson)
            <div class="row text-muted">
                <div class="col-md-6">
                    {{ $contactPerson->name }}
                </div>
                <div class="col-md-3 col-6">
                    {{ $contactPerson->phone_number }}
                </div>
                <div class="col-md-3 col-6">
                    {{ $contactPerson->primary ? 'Primary' : 'Secondary' }}
                </div>
            </div>
            @if(!$loop->last)
                <hr class="narrow-hr" />
            @endif
        @endforeach
    </div>
</div>

@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Email') }}</label>
                <input type="email" wire:model="Email" class="form-control">
                @error('Email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Password') }}</label>
                <input type="password" wire:model="Password" class="form-control">
                @error('Password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Father') }}</label>
                <input type="text" wire:model="Name_Father" class="form-control">
                @error('Name_Father')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Father_en') }}</label>
                <input type="text" wire:model="Name_Father_en" class="form-control">
                @error('Name_Father_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Father') }}</label>
                <input type="text" wire:model="Job_Father" class="form-control">
                @error('Job_Father')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Father_en') }}</label>
                <input type="text" wire:model="Job_Father_en" class="form-control">
                @error('Job_Father_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.National_ID_Father') }}</label>
                <input type="text" wire:model="National_ID_Father" class="form-control">
                @error('National_ID_Father')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Passport_ID_Father') }}</label>
                <input type="text" wire:model="Passport_ID_Father" class="form-control">
                @error('Passport_ID_Father')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.Phone_Father') }}</label>
                <input type="text" wire:model="Phone_Father" class="form-control">
                @error('Phone_Father')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($Nationalities as $National)
                        @php
                            $name = json_decode($National->Name, true); // تحويل النص إلى مصفوفة
                        @endphp
                        <option value="{{ $National->id }}">
                            {{ LaravelLocalization::getCurrentLocale() == 'ar' ? $name['ar'] : $name['en'] }}</option>
                    @endforeach
                </select>
                @error('Nationality_Father_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($Type_Bloods as $Type_Blood)
                        @php
                            $name = json_decode($Type_Blood->Name, true);
                        @endphp
                        <option value="{{ $Type_Blood->id }}">
                            {{ $name && isset($name[LaravelLocalization::getCurrentLocale()]) ? $name[LaravelLocalization::getCurrentLocale()] : $Type_Blood->Name }}
                        </option>
                    @endforeach
                </select>
                @error('Blood_Type_Father_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col">
                <label for="inputZip">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($Religions as $Religion)
                        @php
                            $name = json_decode($Religion->Name, true);
                        @endphp
                        <option value="{{ $Religion->id }}">
                            {{ $name[LaravelLocalization::getCurrentLocale()] ?? $Religion->Name }}
                        </option>
                    @endforeach
                </select>
                @error('Religion_Father_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('Parent_trans.Address_Father') }}</label>
            <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Father')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success btn-sm mx-3 nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
            type="button">{{ trans('Parent_trans.Next') }}
        </button>

    </div>
</div>
</div>

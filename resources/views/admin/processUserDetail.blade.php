@extends('mainLayout')

@section('page-content')
   <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form action="{{ route('saveuserdetails',$user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label">User ID: <span class="fw-bold">{{ $user->id }}</span></label>
                                    {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Full Name:</label>
                                    <input type="text" class="form-control-sm form-control fw-bold border border-0 fs-4 lh-1" name="full-user-name" id="full-user-name" value="{{ $user->userinfo->user_firstname.' '.$user->userinfo->user_lastname }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="login-user-name" class="form-label">Login Name:</label>
                                    <input type="text" class="form-control-sm form-control border border-dark-subtle fs-4 lh-1" name="login_user_name" id="login-user-name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-input border-dark-subtle" name="enable_password_change" id="enable-password-change"
                                    @if(Session::get('pwChangeEnabled') == 'enabled')
                                       checked = "true"
                                    @endif
                                    >
                                    {{ Session::get('pwChangeEnabled') }}
                                    <label for="enable-password-change" class="form-label">Change Password?</label>
                                </div>
                                <div class="form-group">
                                    <label for="user-password" class="form-label">New Password:</label>
                                    <input type="password" class="form-control-sm form-control border border-dark-subtle fs-4 lh-1" name="user_password" id="user-password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm-user-password" class="form-label">Confirm New Password:</label>
                                    <input type="password" class="form-control-sm form-control border border-dark-subtle fs-4 lh-1" name="user_password_confirmation" id="confirm-user-password">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    @error('login_user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    @error('user_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    @error('user_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 border-start border-dark-subtle">
                                <table>
                                    <tr>
                                        <th colspan="4">
                                            User Roles
                                        </th>
                                    </tr>
                                @foreach ($roles as $role)

                                    <tr>
                                        <td>

                                            <input type="checkbox" class="form-check-input border border-dark d-inline-block me-2" id="user-role-{{ $role->id }}" name="user-role[]" value="{{ $role->id }}"
                                            @if( $user->hasRole($role->name))
                                                  checked="true"
                                            @endif
                                            onchange="setRoles(this, {{ $role->id }})">

                                        </td>
                                        <td class="lh-1 fs-6">
                                            <label for="user-role-{{ $role->id }}">{{ strtoupper($role->name) }}</label>
                                        </td>
                                    </tr>

                                @endforeach
                                </table>
                            </div>
                            <div class="col-sm-3 border-start border-dark-subtle">
                                <table id="permissions">
                                    <thead>
                                        <tr>
                                            <th colspan="3">
                                                User Permissions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="permission-body">
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                {{ strtoupper(str_replace('_',' ',$permission->name)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 border-top border-dark-subtle">
                            <div class="col pt-3">
                                <button type="submit" class="btn btn-primary">Submit Changes</button>
                                <button id="reset-form-values" type=reset class="btn btn-danger">Revert Changes</button>
                                <a href="{{ route('usertool') }}" class="btn btn-success text-light">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


   </div>

@endsection

@section('js-scripts')
<script>
    let userPassword = document.getElementById('user-password');
    let confirmUserPassword = document.getElementById('confirm-user-password');;
    let permissionsTableBody = document.getElementById('permission-body');

    userPassword.setAttribute('disabled','true');
    confirmUserPassword.setAttribute('disabled','true');

    document.getElementById('enable-password-change').addEventListener('change',function(event) {
           if(this.checked){
               userPassword.removeAttribute('disabled');
               confirmUserPassword.removeAttribute('disabled')
           }
           else {
               userPassword.setAttribute('disabled','true');
               confirmUserPassword.setAttribute('disabled','true');
           }
    });

    document.getElementById('reset-form-values').addEventListener('click',function(){
           if(!userPassword.disabled && !confirmUserPassword.disabled){
               userPassword.setAttribute('disabled','true');
               confirmUserPassword.setAttribute('disabled','true');
           }

    });



    function setRoles(element, id){
        if(element.checked){
            console.log(element.value);

            axios.get('/admin/user/pprofile/'+id,)
            .then(response =>{
                return response.data;
            })
            .then(response =>{

            })
            .then(response => {

            });
        } else {
            if(permissionsTableBody.hasChildNodes()){
                console.log(permissionsTableBody.children);
               for(let item in permissionsTableBody.children){
                  permissionsTableBody.removeChild(permissionsTableBody.children[item]);
               }
            }
        }
    }

    function createPermimssionList(permissionList){
         console.log('Parameter: '+permissionList);
         let tableFragment = document.createDocumentFragment();
         let tableRow = document.createElement('tr');
         let tableCol = document.createElement('td');

         for(let permission of permissionList){
             let newRow = tableRow.cloneNode(true);
             let newCol = tableCol.cloneNode(true);

             newCol.innerHTML = permissionList.name;

             newRow.appendChild(newCol);

             permissionsTableBody.appendChild(newRow);
         }
    }
</script>
@endsection

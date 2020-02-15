<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <button class="mb-3 btn btn-primary" data-toggle="modal" data-target="#addNew">
              <i class="fas fa-user-plus"></i> Tambah User
            </button>
            <table  class="table table-striped table-bordered table-hover" id="#">
            
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Nama Universitas</th>
                  <th>Provinsi</th>
                  <th>Kota</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                 
              <tbody>
                <tr v-for="user in users" :key="user.id">
                  <td>{{user.id}}</td>
                  <td>{{user.name}}</td>
                  <td>{{user.nama_univ}}</td>
                  <td>{{user.provinsi}}</td>
                  <td>{{user.kota}}</td>
                  <td>{{user.email}}</td>
                  <td>{{user.no_hp}}</td>
                  <td>{{user.type}}</td>
                
                  <td width="172px">
                    <a href="#">
                      <button
                        title="Edit User"
                        class="float-left mr-1 btn btn-primary"
                        data-toggle="modal"
                        data-target="#Edit"
                      >
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="#">
                      <button
                        title="Hapus User"
                        class="float-left mr-1 btn btn-danger"
                        @click="deleteUser(user.id)"
                      >
                        <i class="fa fa-trash"></i>
                      </button>
                    </a>
                    <a href="#">
                      <button
                        title="Lihat User"
                        class="float-left mr-1 btn btn-success"
                        data-toggle="modal"
                        data-target="#Lihat"
                      >
                        <i class="fa fa-eye"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="createUser">
            <div class="modal-body">


              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  placeholder="Nama"
                  name="name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>

              <div class="form-group">
                <input
                  v-model="form.email"
                  type="email"
                  name="email"
                  placeholder="Alamat Email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
              
               <div class="form-group">
                <input
                  v-model="form.no_hp"
                  type="integer"
                  name="no_hp"
                  placeholder="Nomor Telepon"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('no_hp') }"
                />
                <has-error :form="form" field="no_hp"></has-error>
              </div> 

               

            <div class="form-group">
                <input v-model="form.password" type="password" name="password" placeholder="Password"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>
            </div>
              
              

              <div class="form-group">
                <select
                  v-model="form.type"
                  type="type"
                  name="type"
                  id="type"
                  placeholder="Type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }">   

                <option value="">Pilih Level</option>
                <option value="Admin" id="admin">Administrator</option>
                <option value="Verifikator" id="verif">Verifikator</option>
                <option value="User" id="user">User</option>

                </select>

                

                <has-error :form="form" field="kota"></has-error>
              </div>

                <div class="form-group">
                <select
                  v-model="form.provinsi"
                  type="provinsi"
                  name="provinsi"
                  id="provinsi"
                  placeholder="Provinsi"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('provinsi') }">   

                <option value="">Pilih Provinsi</option>
                <option value="Jawa Barat" id="jabar">Jawa Barat</option>
                <option value="Jawa Timur" id="jatim">Jawa Timur</option>
                <option value="Jawa Tengah" id="jateng">Jawa Tengah</option>

                </select>

                

                <has-error :form="form" field="kota"></has-error>
              </div>
              
              

              <div class="form-group">
                <select
                  v-model="form.kota"
                  type="kota"
                  name="kota"
                  id="kota"
                  placeholder="Kota"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('kota') }">   

                <option value="" id="jabar">Pilih Kota</option>
                <option value="Tasikmalaya">Tasikmalaya</option>
                <option value="Bandung">Bandung</option>
                <option value="Banjar">Banjar</option>

                <option value="" id="jatim">Pilih Kota</option>
                <option value="Tasikmalaya">Surabaya</option>
                <option value="Bandung">Magelang</option>
                <option value="Banjar">Gresik</option>

                </select>

                

                <has-error :form="form" field="kota"></has-error>
              </div>

              <div class="form-group">
                <select
                  v-model="form.nama_univ"
                  type="nama_univ"
                  name="nama_univ"
                  id="nama_univ"
                  placeholder="Nama Universitas"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('nama_univ') }">   

                <option value="" id="#" placeholder="Masukan Kode">Pilih Universitas</option>
                <option value="Tasikmalaya">Universitas Siliwangi</option>
                <option value="Bandung">Universitas Padjadjaran</option>
                <option value="Banjar">Sekolah Tinggi Teknik Informatika</option>

              

                </select>

                

                <has-error :form="form" field="kota"></has-error>
              </div>

            

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="Edit"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              <button type="button" class="btn btn-primary">Edit</button>
            </div>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="Lihat"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lihat User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="Hapus"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        users : {},
      form: new Form({
        name: "",
        email: "",
        nama_univ: "",
        no_hp: "",
        type: "",
        password: "",
        photo: "",
        provinsi: "",
        kota: ""
      })
    };
  },
  methods: {
      deleteUser(id){
         swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                // Mengirim Rekues Ke Server
                this.form.delete('/api/user/'+id).then(()=>{  
                    swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                
                })
                .catch(()=>{
                    swal.fire("Failed!", "Kesalahan Telah Terjadi.", "warning");
                });
                
            })
      },
      loadUsers(){
          axios.get("api/user").then(({ data }) => (this.users = data.data));
      },

      createUser(){
          this.$Progress.start();
          this.form.post('api/user')
          .then(()=>{
          $('#addNew').modal('hide')

          toast.fire({
            icon: 'success',
            title: 'User Berhasil di Buat'
            })

          this.$Progress.finish();
          })
          .catch(() => {

          })
          
          
      }
  },
  created() {
    this.loadUsers();
    
    //setInterval(() => this.loadUsers(), 3000);
  }
};

$(document).ready(function() {
  $("#Table").DataTable();
});
</script>

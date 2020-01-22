<template>
    <div>
        <div v-if="$gate.isMaster()">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card">
                        <div class="card-header">Manage School-List</div>
                        <div class="card-body">
                            <router-link to="/create-school" class="btn btn-danger btn-block btn-lg">Manage Schools</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="!$gate.isMaster()">
            <div class="card">
                <div class="card-body">
                    <h3>Welcome to {{school.name}}</h3>
                    Your presence and cooperation will help us to improve the education system of our
                    organization.
                </div>
            </div>
            <div class="row mt-5">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{teachers.length}}</h3>

                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{students.length}}</h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{classes.length}}</h3>

                <p>Classes</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>4</h3>

                <p>Section</p>
              </div>
              <div class="icon">
                <i class="fas fa-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
    </div>
</template>

<script>
    export default {
    data() {
        return {
            school_id: window.user.school_id,
            school: {},
            classes: [],
            sections: [],
            teachers: [],
            students: []
        }
    },
    methods: {
        getSchool() {
            if(this.school_id > 0) {
                axios.get('api/school/'+this.school_id)
                .then((data) => {
                    this.school = data.data.school
                })
            }
        },
        getData() {
            axios.get('api/analysis/'+this.school_id)
            .then((data) => {
                console.log(data);
                this.classes = data.data.classes
                this.teachers = data.data.teachers,
                this.students = data.data.students
            })
        }
    },
    created() {
        this.getSchool()
        this.getData()
    }
}
</script>

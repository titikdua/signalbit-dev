pipeline {
    agent any
    stages{
        stage('Get Latest Code') {
            steps {
                script{
                    sh "oc login https://192.168.98.11:6443 -u alif -palif123"
					sh " echo oc get project "
                }
            }
        }
        stage("Build App") {
            steps {
                script{
                    sh "oc login https://192.168.98.11:6443 -u alif -palif123"
					sh " echo oc get project "
                }
            }
        }
    }
}

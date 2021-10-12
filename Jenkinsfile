pipeline {
    agent any
    stages{
        stage('Get Latest Code') {
            steps {
                script{
                    sh "oc login --token=sha256~g1D_W2pGTne5af7xjc1CijSKyOeAArbS0YddOWvDspE --server=https://api.lab.ocp.local:6443 --insecure-skip-tls-verify=true"
					sh "oc new-app php~https://gitlab.lab.ocp.local/devapp/signalbit.git"
                }
            }
        }
        stage("Build App") {
            steps {
                script{
                    sh "oc login --token=sha256~g1D_W2pGTne5af7xjc1CijSKyOeAArbS0YddOWvDspE --server=https://api.lab.ocp.local:6443 --insecure-skip-tls-verify=true"
					sh " echo oc get project "
                }
            }
        }
    }
}


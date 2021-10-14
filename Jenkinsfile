pipeline {
 options {
        // set a timeout of 60 minutes for this pipeline
        timeout(time: 60, unit: 'MINUTES')
    }
     agent {
          node {
            //TODO: Add label for the Maven jenkins agent
          }
        }
        environment {
                //TODO: Customize these variables for your environment
                DEV_PROJECT = "signalbit-dev"
                STAGE_PROJECT = "signalbit-stage"
                APP_GIT_URL = "https://gitlab.lab.ocp.local/devapp/signalbit.git"
                //NEXUS_SERVER_PUSH = "http://192.168.98.193:50443"
                //NEXUS_SERVER_PULL = "http://192.168.98.193:50000"
                // DO NOT CHANGE THE GLOBAL VARS BELOW THIS LINE
                APP_NAME = "signalbit"
            }


    stages{
        stage('Compilation Check') {
            steps {
                script{
                    echo '###Checking for compile error###'
                    sh "oc login --token=sha256~g1D_W2pGTne5af7xjc1CijSKyOeAArbS0YddOWvDspE --server=https://api.lab.ocp.local:6443 --insecure-skip-tls-verify=true"
					sh "oc start-build signalbit"
					sh "podman login"
                }
            }
        }
        stage("Build App") {
            steps {
                script{
                    sh "oc login --token=sha256~g1D_W2pGTne5af7xjc1CijSKyOeAArbS0YddOWvDspE --server=https://api.lab.ocp.local:6443 --insecure-skip-tls-verify=true"
					sh "oc start-build signalbit"
                }
            }
        }
    }
}


pipeline {
    agent { docker { image 'php' } }
    stages {
        stage('build') {
            steps {
                sh 'oc login https://192.168.98.11:6443 -u alif -palif123'
				sh 'oc projects'
            }
        }
    }
}
}

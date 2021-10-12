pipeline {
    agent any
    stages{
        stage('Get Latest Code') {
            steps {
                script{
				sh "git branch: 'signalbit-dev', url: 'https://github.com/titikdua/signalbit-dev.git' "
                   // sh "echo get latest"
                }
            }
        }
        stage("Build App") {
            steps {
                script{
				sh "git branch: 'signalbit-dev', url: 'https://github.com/titikdua/signalbit-dev.git' "
                    // sh "echo build"
                }
            }
        }
    }
}



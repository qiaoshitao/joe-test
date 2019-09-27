pipeline {
    agent any

    options {
        gitLabConnection('gitlab.chupinxiu.com')
    }
    triggers {
        gitlab(triggerOnPush: true, triggerOnMergeRequest: true, branchFilterType: 'All')
    }

    environment {
        cleanMavenCmd = "python /root/.jenkins/workspace/jenkins_script/build/clean.py"
        //检测是否需要构建
        checkBuildCmd = "python /root/.jenkins/workspace/jenkins_script/build/check.py"
        //构建完成确认
        confirmBuildCmd = "python /root/.jenkins/workspace/jenkins_script/build/confirm.py"
        //钉钉hook
        dingTalk = "f235d249c67d7f358dbe466e21e5456bfdcb57231cbc34a85b73009abedc5fc8"
        //注册中心地址
        apollo = "http://config.cloud.chupinxiu.com"
        //branch映射
        branch = "${env.BRANCH_NAME == "ci" ? "dev" : env.BRANCH_NAME == "master" ? "stg" : env.BRANCH_NAME}"
        // docker url
        imageUrl = "registry-vpc.cn-beijing.aliyuncs.com"

        // jenkins 地址
        jenkinsUrl = "http://47.94.252.60:8080"

        project = "material"
        dir = "."
        appid = "100013"
        agentid = "material"

        image = "${env.imageUrl}/cpx-${env.branch}/${env.project}"
    }
    parameters {
        booleanParam(name: 'rollback', defaultValue: false, description: '回滚构建')
        string(name: 'rollback_project', defaultValue: '', description: '回滚构建项目')
        string(name: 'rollback_build_number', defaultValue: '', description: '回滚构建号码')
        booleanParam(name: 'build_all', defaultValue: true, description: '刷新强制全部构建')
    }

    stages {
        stage("build") {
            
            steps {
                echo "build"
            }
        }
        stage("sonar-jacoco") {
            
            steps {
                echo "sonar-jacoco"
            }
        }
        stage("deploy") {
            
            steps {
                echo "deploy"
            }
        }
    }
    post {
        success {
            echo "构建成功"
        }
        failure {
            echo "构建失败"
        }
    }
}

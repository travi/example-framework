def run(command)
    raise "Failed to execute '#{command}'" if !system(command)
end

task :default => [:dependencies]

desc 'dependencies'
task :dependencies do
    run('bundle install')
    run('composer install')
    run('npm install')
    run('grunt build')
end

desc 'initialize the workspace'
task :initialize do
    Rake::Task["dependencies"].invoke
    Dir.mkdir("puppet/modules")
    run('vagrant up')
end

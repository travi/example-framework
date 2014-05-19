def run(command)
    raise "Failed to execute '#{command}'" if !system(command)
end

desc 'dependencies'
task :dependencies do
    run('npm install')
    run('grunt build')
end
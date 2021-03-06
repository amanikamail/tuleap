<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
function autoloadc3e973f9053cf10b13ebec3afa1c6e63($class) {
    static $classes = null;
    if ($classes === null) {
        $classes = array(
            'git' => '/Git.class.php',
            'git_admingerritcontroller' => '/Git/AdminGerritController.class.php',
            'git_admingerritpresenter' => '/Git/AdminGerritPresenter.class.php',
            'git_adminmallowedprojectspresenter' => '/Git/AdminAllowedProjectsPresenter.class.php',
            'git_adminmirroraddpresenter' => '/Git/AdminMirrorAddPresenter.class.php',
            'git_adminmirrorcontroller' => '/Git/AdminMirrorController.class.php',
            'git_adminmirroreditpresenter' => '/Git/AdminMirrorEditPresenter.class.php',
            'git_adminmirrorlistpresenter' => '/Git/AdminMirrorListPresenter.class.php',
            'git_adminmirrorpresenter' => '/Git/AdminMirrorPresenter.class.php',
            'git_adminmrepositorylistpresenter' => '/Git/AdminRepositoryListPresenter.class.php',
            'git_adminpresenter' => '/Git/AdminPresenter.class.php',
            'git_adminrepositorylistforprojectpresenter' => '/Git/AdminRepositoryListForProjectPresenter.class.php',
            'git_adminrouter' => '/Git/AdminRouter.class.php',
            'git_backend_gitolite' => '/Git_Backend_Gitolite.class.php',
            'git_backend_interface' => '/Git_Backend_Interface.php',
            'git_ci' => '/Git/Ci.class.php',
            'git_ci_dao' => '/Git/Ci/Dao.class.php',
            'git_ci_launcher' => '/Git/Ci/Launcher.class.php',
            'git_command_exception' => '/exceptions/Git_Command_Exception.class.php',
            'git_command_unknownobjecttypeexception' => '/exceptions/Git_Command_UnknownObjectTypeException.class.php',
            'git_driver_gerrit' => '/Git/Driver/GerritDriver.class.php',
            'git_driver_gerrit_exception' => '/Git/Driver/Gerrit/Exception.class.php',
            'git_driver_gerrit_execfetch' => '/Git/Driver/Gerrit/ExecFetch.class.php',
            'git_driver_gerrit_gerritdriverfactory' => '/Git/Driver/GerritDriverFactory.php',
            'git_driver_gerrit_membershipcommand' => '/Git/Driver/Gerrit/MembershipCommand.class.php',
            'git_driver_gerrit_membershipcommand_addbinding' => '/Git/Driver/Gerrit/MembershipCommand/AddBinding.class.php',
            'git_driver_gerrit_membershipcommand_adduser' => '/Git/Driver/Gerrit/MembershipCommand/AddUser.class.php',
            'git_driver_gerrit_membershipcommand_removebinding' => '/Git/Driver/Gerrit/MembershipCommand/RemoveBinding.class.php',
            'git_driver_gerrit_membershipcommand_removeuser' => '/Git/Driver/Gerrit/MembershipCommand/RemoveUser.class.php',
            'git_driver_gerrit_membershipcommand_user' => '/Git/Driver/Gerrit/MembershipCommand/User.class.php',
            'git_driver_gerrit_membershipdao' => '/Git/Driver/Gerrit/MembershipDao.class.php',
            'git_driver_gerrit_membershipmanager' => '/Git/Driver/Gerrit/MembershipManager.class.php',
            'git_driver_gerrit_projectcreator' => '/Git/Driver/Gerrit/ProjectCreator.class.php',
            'git_driver_gerrit_projectcreator_projectalreadyexistsexception' => '/Git/Driver/Gerrit/ProjectCreator_ProjectAlreadyexistsException.class.php',
            'git_driver_gerrit_remotesshcommand' => '/Git/Driver/Gerrit/RemoteSSHCommand.class.php',
            'git_driver_gerrit_remotesshcommandfailure' => '/Git/Driver/Gerrit/RemoteSSHCommandFailure.class.php',
            'git_driver_gerrit_remotesshconfig' => '/Git/Driver/Gerrit/RemoteSSHConfig.class.php',
            'git_driver_gerrit_template_template' => '/Git/Driver/Gerrit/Template/Template.class.php',
            'git_driver_gerrit_template_templatedao' => '/Git/Driver/Gerrit/Template/TemplateDao.class.php',
            'git_driver_gerrit_template_templatefactory' => '/Git/Driver/Gerrit/Template/TemplateFactory.class.php',
            'git_driver_gerrit_template_templateprocessor' => '/Git/Driver/Gerrit/Template/TemplateProcessor.class.php',
            'git_driver_gerrit_umbrellaprojectmanager' => '/Git/Driver/Gerrit/UmbrellaProjectManager.class.php',
            'git_driver_gerrit_user' => '/Git/Driver/Gerrit/User.class.php',
            'git_driver_gerrit_useraccountmanager' => '/Git/Driver/Gerrit/UserAccountManager.class.php',
            'git_driver_gerrit_userfinder' => '/Git/Driver/Gerrit/UserFinder.class.php',
            'git_driver_gerritlegacy' => '/Git/Driver/GerritLegacy.class.php',
            'git_driver_gerritrest' => '/Git/Driver/GerritREST.class.php',
            'git_exec' => '/Git_Exec.class.php',
            'git_gitolite_configpermissionsserializer' => '/Git/Gitolite/ConfigPermissionsSerializer.class.php',
            'git_gitolite_gitmodifications' => '/Git/Gitolite/GitModifications.php',
            'git_gitolite_gitoliteconfwriter' => '/Git/Gitolite/GitoliteConfWriter.php',
            'git_gitolite_gitolitercreader' => '/Git/Gitolite/GitoliteRCReader.php',
            'git_gitolite_presenter_gitoliteconfpresenter' => '/Git/Gitolite/Presenter/GitoliteConfPresenter.class.php',
            'git_gitolite_projectserializer' => '/Git/Gitolite/ProjectSerializer.class.php',
            'git_gitolite_sshkeydumper' => '/Git_Gitolite_SSHKeyDumper.class.php',
            'git_gitolite_sshkeymassdumper' => '/Git_Gitolite_SSHKeyMassDumper.class.php',
            'git_gitolitedriver' => '/Git_GitoliteDriver.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_checkrunningevents' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/CheckRunningEvents.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_cleanupgitoliteadminrepo' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/CleanUpGitoliteAdminRepo.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_command' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/Command.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_donothing' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/DoNothing.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_enablegitgc' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/EnableGitGc.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_servicerestarter' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/ServiceRestarter.class.php',
            'git_gitolitehousekeeping_chainofresponsibility_servicestopper' => '/Git/GitoliteHousekeeping/ChainOfResponsibility/ServiceStopper.class.php',
            'git_gitolitehousekeeping_gitolitehousekeepingdao' => '/Git/GitoliteHousekeeping/GitoliteHousekeepingDao.class.php',
            'git_gitolitehousekeeping_gitolitehousekeepinggitgc' => '/Git/GitoliteHousekeeping/GitoliteHousekeepingGitGc.class.php',
            'git_gitolitehousekeeping_gitolitehousekeepingresponse' => '/Git/GitoliteHousekeeping/GitoliteHousekeepingResponse.class.php',
            'git_gitolitehousekeeping_gitolitehousekeepingrunner' => '/Git/GitoliteHousekeeping/GitoliteHousekeepingRunner.class.php',
            'git_gitrepositoryurlmanager' => '/GitRepositoryUrlManager.class.php',
            'git_hook_extractcrossreferences' => '/Git/Hook/ExtractCrossReferences.class.php',
            'git_hook_loganalyzer' => '/Git/Hook/LogAnalyzer.class.php',
            'git_hook_logpushes' => '/Git/Hook/LogPushes.class.php',
            'git_hook_parselog' => '/Git/Hook/ParseLog.class.php',
            'git_hook_postreceive' => '/Git/Hook/PostReceive.class.php',
            'git_hook_pushdetails' => '/Git/Hook/PushDetails.class.php',
            'git_http_command' => '/Git/HTTP/Command.class.php',
            'git_http_commandcentos5githttpbackend' => '/Git/HTTP/CommandCentos5GitHttpBackend.class.php',
            'git_http_commandcentos6githttpbackend' => '/Git/HTTP/CommandCentos6GitHttpBackend.class.php',
            'git_http_commandfactory' => '/Git/HTTP/CommandFactory.class.php',
            'git_http_commandgitolite' => '/Git/HTTP/CommandGitolite.class.php',
            'git_http_commandgitolite3' => '/Git/HTTP/CommandGitolite3.class.php',
            'git_http_commandscl19githttpbackend' => '/Git/HTTP/CommandSCL19GitHttpBackend.class.php',
            'git_http_wrapper' => '/Git/HTTP/Wrapper.class.php',
            'git_lastpushesgraph' => '/Git_LastPushesGraph.class.php',
            'git_logdao' => '/Git_LogDao.class.php',
            'git_mirror_createexception' => '/Git/Mirror/CreateException.class.php',
            'git_mirror_hostnamealreadyusedexception' => '/Git/Mirror/HostnameAlreadyUsedException.php',
            'git_mirror_hostnameisreservedexception' => '/Git/Mirror/HostnameIsReservedException.php',
            'git_mirror_manifestfilegenerator' => '/Git/Mirror/ManifestFileGenerator.class.php',
            'git_mirror_manifestmanager' => '/Git/Mirror/ManifestManager.class.php',
            'git_mirror_mirror' => '/Git/Mirror/Mirror.class.php',
            'git_mirror_mirrordao' => '/Git/Mirror/MirrorDao.class.php',
            'git_mirror_mirrordatamapper' => '/Git/Mirror/MirrorDataMapper.class.php',
            'git_mirror_mirrornochangesexception' => '/Git/Mirror/MirrorNoChangesException.class.php',
            'git_mirror_mirrornotfoundexception' => '/Git/Mirror/MirrorNotFoundException.class.php',
            'git_mirror_mirrorsystemeventqueue' => '/Git/Mirror/MirrorSystemEventQueue.class.php',
            'git_mirror_missingdataexception' => '/Git/Mirror/MissingDataException.class.php',
            'git_mirrorresourcerestrictor' => '/Git/Mirror/MirrorResourceRestrictor.class.php',
            'git_permissionsdao' => '/Git/PermissionsDao.php',
            'git_postreceivemaildao' => '/Git_PostReceiveMailDao.class.php',
            'git_postreceivemailmanager' => '/Git_PostReceiveMailManager.class.php',
            'git_projectnotfoundexception' => '/exceptions/ProjectNotFoundException.class.php',
            'git_referencemanager' => '/Git/ReferenceManager.class.php',
            'git_remoteserver_dao' => '/Git/RemoteServer/Dao.class.php',
            'git_remoteserver_gerrit_projectnamebuilder' => '/Git/RemoteServer/Gerrit/ProjectNameBuilder.class.php',
            'git_remoteserver_gerrit_replicationsshkey' => '/Git/RemoteServer/Gerrit/ReplicationSSHKey.class.php',
            'git_remoteserver_gerrit_replicationsshkeyfactoryexception' => '/Git/RemoteServer/Gerrit/ReplicationSSHKeyFactoryException.class.php',
            'git_remoteserver_gerritserver' => '/Git/RemoteServer/GerritServer.class.php',
            'git_remoteserver_gerritserverfactory' => '/Git/RemoteServer/GerritServerFactory.class.php',
            'git_remoteserver_gerritserverpresenter' => '/Git/RemoteServer/GerritServerPresenter.class.php',
            'git_remoteserver_notfoundexception' => '/Git/RemoteServer/NotFoundException.class.php',
            'git_rest_resourcesinjector' => '/REST/ResourcesInjector.class.php',
            'git_restrictedmirrordao' => '/Git/Mirror/RestrictedMirrorDao.class.php',
            'git_systemcheck' => '/Git/SystemCheck.class.php',
            'git_systemeventmanager' => '/Git/SystemEventManager.class.php',
            'git_systemeventqueue' => '/Git/SystemEventQueue.class.php',
            'git_template_notfoundexception' => '/Git/Driver/Gerrit/Template/Git_Template_NotFoundException.class.php',
            'git_templatenotinprojecthierarchyexception' => '/exceptions/TemplateNotInProjectNotInHierarchyException.php',
            'git_url' => '/Git/URL.class.php',
            'git_useraccountmanager' => '/Git/UserAccountManager.class.php',
            'git_usersynchronisationexception' => '/Git/UserSynchronisationException.class.php',
            'git_widget_projectpushes' => '/Git_Widget_ProjectPushes.class.php',
            'git_widget_userpushes' => '/Git_Widget_UserPushes.class.php',
            'gitactions' => '/GitActions.class.php',
            'gitauthorizedkeysfileexception' => '/exceptions/GitAuthorizedKeysFileException.class.php',
            'gitbackend' => '/GitBackend.class.php',
            'gitbackendexception' => '/exceptions/GitBackendException.class.php',
            'gitbackendlogger' => '/GitBackendLogger.php',
            'gitconfig' => '/GitConfig.class.php',
            'gitdao' => '/GitDao.class.php',
            'gitdaoexception' => '/exceptions/GitDaoException.class.php',
            'gitdriver' => '/GitDriver.class.php',
            'gitdriverdestinationnotemptyexception' => '/exceptions/GitDriverDestinationNotEmptyException.class.php',
            'gitdrivererrorexception' => '/exceptions/GitDriverErrorException.class.php',
            'gitdriverexception' => '/exceptions/GitDriverException.class.php',
            'gitdriversourcenotfoundexception' => '/exceptions/GitDriverSourceNotFoundException.class.php',
            'gitforkpermissionsmanager' => '/GitForkPermissionsManager.class.php',
            'gitlog' => '/GitLog.class.php',
            'gitpermissionsmanager' => '/GitPermissionsManager.class.php',
            'gitplugin' => '/gitPlugin.class.php',
            'gitplugindescriptor' => '/GitPluginDescriptor.class.php',
            'gitplugininfo' => '/GitPluginInfo.class.php',
            'gitpresenters_accesscontrolpresenter' => '/GitPresenters/AccessControlPresenter.class.php',
            'gitpresenters_admingerrittemplatespresenter' => '/GitPresenters/AdminGerritTemplatesPresenter.class.php',
            'gitpresenters_admingitadminspresenter' => '/GitPresenters/AdminGitAdminsPresenter.class.php',
            'gitpresenters_adminmassudpdatemirroringpresenter' => '/GitPresenters/AdminMassUpdateMirroringPresenter.php',
            'gitpresenters_adminmassupdatepresenter' => '/GitPresenters/AdminMassUpdatePresenter.class.php',
            'gitpresenters_adminmassupdateselectrepositoriespresenter' => '/GitPresenters/AdminMassUpdateSelectRepositoriesPresenter.class.php',
            'gitpresenters_adminpresenter' => '/GitPresenters/AdminPresenter.php',
            'gitpresenters_gerritasthirdpartypresenter' => '/GitPresenters/GerritAsThirdPartyPresenter.php',
            'gitpresenters_mirroringpresenter' => '/GitPresenters/MirroringPresenter.php',
            'gitpresenters_mirrorpresenter' => '/GitPresenters/MirrorPresenter.php',
            'gitreponotfoundexception' => '/exceptions/GitRepoNotFoundException.class.php',
            'gitreponotinprojectexception' => '/exceptions/GitRepoNotInProjectException.class.php',
            'gitreponotongerritexception' => '/exceptions/GitRepoNotOnGerritException.class.php',
            'gitreponotreadableexception' => '/exceptions/GitRepoNotReadableException.class.php',
            'gitrepository' => '/GitRepository.class.php',
            'gitrepositoryalreadyexistsexception' => '/exceptions/GitRepositoryAlreadyExistsException.class.php',
            'gitrepositorycreator' => '/GitRepositoryCreator.class.php',
            'gitrepositorycreatorimpl' => '/GitRepositoryCreatorImpl.class.php',
            'gitrepositoryexception' => '/exceptions/GitRepositoryException.class.php',
            'gitrepositoryfactory' => '/GitRepositoryFactory.class.php',
            'gitrepositorygitoliteadmin' => '/GitRepositoryGitoliteAdmin.class.php',
            'gitrepositorymanager' => '/GitRepositoryManager.class.php',
            'gitrepositorypermissionsmanager' => '/GitRepositoryPermissionsManager.class.php',
            'gitrepositorywithpermissions' => '/GitRepositoryWithPermissions.class.php',
            'gitusernotadminexception' => '/exceptions/GitUserNotAdminException.class.php',
            'gitviews' => '/GitViews.class.php',
            'gitviews_gitphpviewer' => '/GitViews/GitPhpViewer.class.php',
            'gitviews_repomanagement' => '/GitViews/RepoManagement/RepoManagement.class.php',
            'gitviews_repomanagement_pane' => '/GitViews/RepoManagement/Pane/Pane.class.php',
            'gitviews_repomanagement_pane_accesscontrol' => '/GitViews/RepoManagement/Pane/AccessControl.class.php',
            'gitviews_repomanagement_pane_delete' => '/GitViews/RepoManagement/Pane/Delete.class.php',
            'gitviews_repomanagement_pane_generalsettings' => '/GitViews/RepoManagement/Pane/GeneralSettings.class.php',
            'gitviews_repomanagement_pane_gerrit' => '/GitViews/RepoManagement/Pane/Gerrit.class.php',
            'gitviews_repomanagement_pane_mirroring' => '/GitViews/RepoManagement/Pane/Mirroring.class.php',
            'gitviews_repomanagement_pane_notification' => '/GitViews/RepoManagement/Pane/Notification.class.php',
            'gitviews_showrepo' => '/GitViews/ShowRepo.class.php',
            'gitviews_showrepo_content' => '/GitViews/ShowRepo/Content.class.php',
            'gitviews_showrepo_download' => '/GitViews/ShowRepo/Download.class.php',
            'gitviewsrepositoriestraversalstrategy' => '/GitViewsRepositoriesTraversalStrategy.class.php',
            'gitviewsrepositoriestraversalstrategy_selectbox' => '/GitViewsRepositoriesTraversalStrategy_Selectbox.class.php',
            'gitviewsrepositoriestraversalstrategy_tree' => '/GitViewsRepositoriesTraversalStrategy_Tree.class.php',
            'malformedpathexception' => '/MalformedPathException.class.php',
            'pluginactions' => '/mvc/PluginActions.class.php',
            'plugincontroller' => '/mvc/PluginController.class.php',
            'pluginviews' => '/mvc/PluginViews.class.php',
            'projectdeletionexception' => '/Git/Driver/Gerrit/ProjectDeletionException.class.php',
            'repositoryclonepresenter' => '/GitPresenters/RepositoryClonePresenter.class.php',
            'systemevent_git_delete_mirror' => '/events/SystemEvent_GIT_DELETE_MIRROR.php',
            'systemevent_git_dump_all_mirrored_repositories' => '/events/SystemEvent_GIT_DUMP_ALL_MIRRORED_REPOSITORIES.php',
            'systemevent_git_dump_all_ssh_keys' => '/events/SystemEvent_GIT_DUMP_ALL_SSH_KEYS.class.php',
            'systemevent_git_edit_ssh_keys' => '/events/SystemEvent_GIT_EDIT_SSH_KEYS.class.php',
            'systemevent_git_gerrit_admin_key_dump' => '/events/SystemEvent_GIT_GERRIT_ADMIN_KEY_DUMP.class.php',
            'systemevent_git_gerrit_migration' => '/events/SystemEvent_GIT_GERRIT_MIGRATION.class.php',
            'systemevent_git_gerrit_project_delete' => '/events/SystemEvent_GIT_GERRIT_PROJECT_DELETE.class.php',
            'systemevent_git_gerrit_project_readonly' => '/events/SystemEvent_GIT_GERRIT_PROJECT_READONLY.class.php',
            'systemevent_git_grokmirror_manifest_check' => '/events/SystemEvent_GIT_GROKMIRROR_MANIFEST_CHECK.class.php',
            'systemevent_git_grokmirror_manifest_repodelete' => '/events/SystemEvent_GIT_GROKMIRROR_MANIFEST_REPODELETE.class.php',
            'systemevent_git_grokmirror_manifest_update' => '/events/SystemEvent_GIT_GROKMIRROR_MANIFEST_UPDATE.class.php',
            'systemevent_git_grokmirror_manifest_update_following_a_git_push' => '/events/SystemEvent_GIT_GROKMIRROR_MANIFEST_UPDATE_FOLLOWING_A_GIT_PUSH.class.php',
            'systemevent_git_legacy_repo_access' => '/events/SystemEvent_GIT_LEGACY_REPO_ACCESS.class.php',
            'systemevent_git_legacy_repo_delete' => '/events/SystemEvent_GIT_LEGACY_REPO_DELETE.class.php',
            'systemevent_git_projects_update' => '/events/SystemEvent_GIT_PROJECTS_UPDATE.class.php',
            'systemevent_git_repo_delete' => '/events/SystemEvent_GIT_REPO_DELETE.class.php',
            'systemevent_git_repo_fork' => '/events/SystemEvent_GIT_REPO_FORK..php',
            'systemevent_git_repo_restore' => '/events/SystemEvent_GIT_REPO_RESTORE.class.php',
            'systemevent_git_repo_update' => '/events/SystemEvent_GIT_REPO_UPDATE.class.php',
            'systemevent_git_update_mirror' => '/events/SystemEvent_GIT_UPDATE_MIRROR.php',
            'systemevent_git_user_rename' => '/events/SystemEvent_GIT_USER_RENAME.class.php',
            'tuleap\\git\\rest\\v1\\gitrepositorypermissionrepresentation' => '/REST/v1/GitRepositoryPermissionRepresentation.class.php',
            'tuleap\\git\\rest\\v1\\gitrepositoryrepresentation' => '/REST/v1/GitRepositoryRepresentation.class.php',
            'tuleap\\git\\rest\\v1\\projectresource' => '/REST/v1/ProjectResource.class.php',
            'tuleap\\git\\rest\\v1\\repositoryrepresentationbuilder' => '/REST/v1/RepositoryRepresentationBuilder.class.php',
            'tuleap\\git\\rest\\v1\\repositoryresource' => '/REST/v1/RepositoryResource.class.php'
        );
    }
    $cn = strtolower($class);
    if (isset($classes[$cn])) {
        require dirname(__FILE__) . $classes[$cn];
    }
}
spl_autoload_register('autoloadc3e973f9053cf10b13ebec3afa1c6e63');
// @codeCoverageIgnoreEnd
